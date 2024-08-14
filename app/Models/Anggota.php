<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\pdl;

class Anggota extends Model
{
    use HasFactory;

    protected $table = "anggota";

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'tanggal_pengajuan',
        'ktp', 
        'kk',
        'foto_anggota',
        'foto_ktp_anggota',
        'foto_anggota_memegang_ktp',
        'usaha',
        'foto_usaha',
        'alamat_usaha',
        'alamat',
        'pengikat',
        'foto_pengikat',
        'nominal_pinjaman',
        'nohp',
        'cabang_id',
        'staff_id',
        'pdl_id'
    ];

    
    public function pdl(): BelongsTo
    {
        return $this->BelongsTo(pdl::class);
    }

}
