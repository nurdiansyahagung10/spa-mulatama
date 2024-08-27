<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Anggota;

class Storting extends Model
{
    use HasFactory;

    protected $table = 'storting';

    protected $fillable = [
        'tanggal_storting',
        'nominal_storting',
        'note',
        'bukti',
        "anggota_id",
    ];

    public function anggota(): BelongsTo
    {
        return $this->BelongsTo(Anggota::class);
    }

}
