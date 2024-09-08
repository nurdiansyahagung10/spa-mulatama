<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Anggota;
use App\Models\Dropping;

class Storting extends Model
{
    use HasFactory;

    protected $table = 'storting';

    protected $fillable = [
        'tanggal_storting',
        'nominal_storting',
        'note',
        'bukti',
        'dropping_id',
    ];

    public function dropping(): BelongsTo
    {
        return $this->BelongsTo(Dropping::class);
    }

}
