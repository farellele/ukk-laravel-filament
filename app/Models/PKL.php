<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PKL extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "pkls";

    protected $fillable = [
        'siswa_id',
        'industri_id',
        'guru_id',
        'waktu_mulai',
        'waktu_selesai',
    ];

    // Definisi relasi
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function industri()
    {
        return $this->belongsTo(Industri::class, 'industri_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    // Booted untuk trigger otomatis di Laravel
    public static function booted(): void
    {
        static::creating(function (PKL $pkl) {
            if (!isset($pkl->siswa_id) || $pkl->newQuery()->where('siswa_id', $pkl->siswa_id)->exists()) {
                throw new \Exception('Siswa ini sudah memiliki PKL.');
            }
        });

        static::created(function (PKL $pkl) {
            if ($pkl->siswa) {
                $pkl->siswa->update(['status_pkl' => 1]);
            }
        });

        static::deleted(function (PKL $pkl) {
            if ($pkl->siswa) {
                $pkl->siswa->update(['status_pkl' => 0]);
            }
        });
    }
}
