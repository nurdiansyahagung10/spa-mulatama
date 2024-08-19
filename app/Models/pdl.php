<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cabang;


class pdl extends Model
{
    use HasFactory;
    
    protected $table = "pdl";

    protected $fillable = [
        'nama',
        'cabang_id',
    ];
    public function cabang(): BelongsTo
    {
    return $this->BelongsTo(Cabang::class);
    }


}
