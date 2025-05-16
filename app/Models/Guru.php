<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    /** @use HasFactory<\Database\Factories\GuruFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'nama',
        'email',
        'nip',
        'alamat',
        'kontak',
        'gender',
    ];

    public function pkl()
    {
        return $this->hasMany(Pkl::class);
    }
    
}
