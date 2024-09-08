<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Anggota;
use App\Models\Storting;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Dropping extends Model
{
    use HasFactory;
    
    protected $table = "dropping";

    protected $fillable = [
        'tanggal_dropping',
        'nominal_dropping',
        'foto_nasabah_mendatangani_spk',
        'foto_nasabah_dan_spk',
        'foto_spk',
        'note',
        'bukti',
        'anggota_id'

    ];


    public function anggota(): BelongsTo
    {
        return $this->BelongsTo(Anggota::class);
    }
    public function storting(): HasMany
    {
        return $this->HasMany(Storting::class);
    }

}
