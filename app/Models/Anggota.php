<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Cabang;

class Anggota extends Model
{
    use HasFactory;

    protected $table = "anggota";

    protected $fillable = [
        'nama',
        'ktp',
        'kk',
        'alamat',
        'pengikat',
        'nohp',
        'cabang_id'
    ];

    
    public function cabang(): BelongsTo
    {
        return $this->BelongsTo(Cabang::class);
    }

}
