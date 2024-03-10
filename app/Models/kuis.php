<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kuis extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kuis';
    protected $table = 'kuis';
    protected $guarded = [];


    public function pertanyaan() {
        return $this->hasMany(pertanyaan::class, 'id_kuis', 'id_kuis');
    }
}
