<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiar la tabla antes de insertar (opcional, útil para re-ejecutar el seeder)
        DB::table('documents')->truncate(); // CUIDADO: Esto eliminará todos los datos existentes

        // Insertar datos
        DB::table('documents')->insert([
            [
                'name' => 'DNI DEL REPRESENTATE LEGAL',
                'order' => 1,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'RC DEL TITULAR',
                'order' => 2,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'ÚLTIMO PAGO DE LA RC DEL TITULAR',
                'order' => 3,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'COMPRA VENTA / ALQUILER DEL LOCAL',
                'order' => 4,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'LICENCIA DE ACTIVIDAD',
                'order' => 5,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'MEMORIA TÉCNICA DEL CENTRO',
                'order' => 6,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'PLANO DE SITUACIÓN',
                'order' => 7,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'PLANO DE PLANTA, FIRMADO 1/100 o 1/150',
                'order' => 8,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'PLANO DE PLANTA, INDICANDO',
                'order' => 9,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'CONTRATOS mantenimiento',
                'order' => 10,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'ALTA AGENCIA PROTECCION DE DATOS',
                'order' => 11,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'CONTRATO DE PROTECCIÓN DE DATOS',
                'order' => 12,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'Productor Residuos tipo III',
                'order' => 13,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'Contrato Recgida de Residuos',
                'order' => 14,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'Alta instalación de RX',
                'order' => 15,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'Contrato Protección Radiologica',
                'order' => 16,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'Programa de Garantía de Calidad',
                'order' => 17,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'Programa de Protección Radiológica',
                'order' => 18,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],
            [
                'name' => 'Contrato de dosimetría',
                'order' => 19,
                'created_at' => now(), // Para las columnas timestamps
                'updated_at' => now(),
            ],

        ]);
    }
}
