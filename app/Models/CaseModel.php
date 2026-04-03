<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseModel extends Model
{
    protected $table = 'cases';

    protected $fillable = [
        'client_id',
        'title',
        'case_number',
        'description',
        'hearing_date',
        'status'
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }

}
