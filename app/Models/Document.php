<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'client_id',
        'case_id',
        'file_name',
        'file_path'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function case()
    {
        return $this->belongsTo(CaseModel::class, 'case_id');
    }
}
