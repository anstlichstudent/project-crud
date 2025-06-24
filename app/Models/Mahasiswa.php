<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Mahasiswa extends Model
{
    protected $table = 'database';

    protected $fillable = [
        'nim',
        'nama',
        'fakultas',
        'prodi',
        'angkatan',
        'nomor_urut',
        'jenis_kelamin',
        'tanggal_lahir',
        'created_by',
        'updated_by',
    ];

    // Generate NIM otomatis sebelum menyimpan
    protected static function booted()
    {
        static::saving(function ($mahasiswa) {
            $mahasiswa->nim = $mahasiswa->fakultas
                . $mahasiswa->prodi
                . $mahasiswa->angkatan
                . '1'
                . str_pad($mahasiswa->nomor_urut, 3, '0', STR_PAD_LEFT);
        });
        static::creating(function ($mahasiswa) {
            if (auth()->check()) {
                $mahasiswa->created_by = auth()->id();
                $mahasiswa->updated_by = auth()->id();
            }
        });
        static::updating(function ($mahasiswa) {
            if (auth()->check()) {
                $mahasiswa->updated_by = auth()->id();
            }
        });
    }

    // Accessor umur
    public function getUmurAttribute()
    {
        return Carbon::parse($this->tanggal_lahir)->age;
    }

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
