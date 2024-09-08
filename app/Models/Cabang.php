<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\pdl;

class Cabang extends Model
{
    use HasFactory;

    protected $table = "cabang";
    protected $fillable = [
        'nama',
        'admin_provisi',
        'simpanan',
        'jasa',
        'created_at',
        'updated_at'
    ];

    public function user(): HasOne
    {
    return $this->HasOne(User::class);
    }
  
    public function pdl(): HasOne
    {
    return $this->HasOne(pdl::class);
    }
}
