<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawaban extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jawaban';
    protected $table = 'jawaban';
    protected $guarded = [];

    public function pertanyaan() {
        return $this->belongsTo(pertanyaan::class, 'id_pertanyaan');
    }
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
