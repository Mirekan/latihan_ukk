<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    /** @use HasFactory<\Database\Factories\PklFactory> */
    use HasFactory;

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function industri()
    {
        return $this->belongsTo(Industri::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'siswa_id',
        'industri_id',
        'guru_id',
        'mulai',
        'selesai',
    ];
}
