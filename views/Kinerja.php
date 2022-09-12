<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    use HasFactory;
    protected $table='kinerja';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'kd_dinas',
            'bidang',
            'nip',
            'waktu',
            'hasil',
            'bukti',
            'status',
            'tgl',
    ];
}
