<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    const STATUS_TRAMITACION = 'Tramitación';
    const STATUS_APROBADO = 'Aprobado';
    const STATUS_PENDIENTE = 'Pendiente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'legal_representative_dni',
        'rn_owner',
        'user_id'
    ];

    public function documents()
    {
        return $this->belongsToMany(Document::class)
            ->withPivot('path', 'valid', 'valid_date', 'valid_user_id', 'comments')
            ->withTimestamps();
    }

    public function urlDocumentsAttribute(){
        return "company_documents/".$this->id;
    }
}
