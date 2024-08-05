<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cabang extends Model
{
    use HasFactory;

    protected $table = "cabang";
    protected $fillable = [
        'nama_cabang',
        'created_at',
        'updated_at'
    ];

    public function user(): HasOne
    {
    return $this->HasOne(User::class);
    }
}
