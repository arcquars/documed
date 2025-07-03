<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Document;
use App\Http\Requests\StoreCompanyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $companies = Company::all();
            return view('companies.index', compact('companies'));
        } catch (\Exception $e) {
            Log::error("Error al obtener el listado de compañías: " . $e->getMessage());
            return redirect()->back()->with('error', 'No se pudo cargar el listado de compañías. Intente de nuevo.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = new Company();
        $documents = Document::active()->orderBy('order', 'asc')->get();
        return view('companies.create', compact('company', 'documents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        try {
            $validateData = $request->validated();
            $validateData['user_id'] = Auth::id();
            $company = Company::create($validateData);

            $documentsToAttach = [];
            $dirDocuments = $company->urlDocumentsAttribute();
            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $documentId => $uploadedFile) {
                    if ($uploadedFile) { // Verifica que el archivo no sea nulo (por 'nullable')
                        // A. Obtener el nombre del documento original usando el ID
                        // Esto asume que tienes un modelo Document y la tabla 'documents'
                        $document = Document::find($documentId);

                        if ($document) {
                            $documentName = $document->name; // ¡Aquí obtienes el nombre del documento!
                            $originalFileName = $uploadedFile->getClientOriginalName(); // Nombre original del archivo subido

                            // Ejemplo de lo que puedes hacer:
                            // 1. Mostrar en consola para verificar
                            Log::info("Documento ID: {$documentId}, Nombre DB: {$documentName}, Archivo Subido: {$originalFileName}");

                            // 2. Guardar el archivo con un nombre relacionado al documento
                            // Puedes usar el ID o el nombre del documento para el path/nombre del archivo guardado
                            $path = $uploadedFile->storeAs(
                                $dirDocuments . DIRECTORY_SEPARATOR . $documentId, // Carpeta basada en el ID del documento
                                $documentName . '_' . time() . '.' . $uploadedFile->getClientOriginalExtension(), // Nombre del archivo
                                'public' // Disco de almacenamiento (configurado en config/filesystems.php)
                            );

                            $documentsToAttach[$documentId] = [
                                'path' => $path,
                                'original_file_name' => $uploadedFile->getClientOriginalName(),
                                'user_id' => Auth::id(),
                                'created_at' => now(), // Si tienes timestamps en la tabla pivote
                                'updated_at' => now(),
                            ];
                        } else {
                            // Manejar el caso donde el ID del documento no existe en la BD
                            Log::warning("Document ID {$documentId} no encontrado en la base de datos al subir archivo.");
                        }
                    }
                }
                try {
                    $company->documents()->syncWithoutDetaching($documentsToAttach);
                    return redirect()->route('companies.index')->with('success', 'Archivos de documentos subidos y vinculados exitosamente.');
                } catch (\Exception $e) {
                    Log::error("Error al vincular documentos a la compañía: " . $e->getMessage());
                    return redirect()->back()->withInput()->with('error', 'No se pudieron vincular los documentos a la compañía.');
                }
            }

            return redirect()->route('companies.index')->with('success', 'Empresa creada exitosamente.');
        } catch (\Exception $e) {
            Log::error("Error al crear la compañía: " . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'No se pudo crear la empresa. Verifique los datos e intente de nuevo.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd("xxxx");
    }
}
