<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\pdl;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Dropping;
use App\Models\Storting;

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
        'jenis_anggota',
        'nohp',
        'cabang_id',
        'staff_id',
        'pdl_id'
    ];

    
    public function pdl(): BelongsTo
    {
        return $this->BelongsTo(pdl::class);
    }

    public function dropping(): HasMany
    {
    return $this->HasMany(Dropping::class);
    }


}
