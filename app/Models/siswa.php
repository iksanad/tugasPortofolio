<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama',
        'alamat',
        'jk',
        'foto',
        'about'
    ];
    protected $table = 'siswa';

    public function kontak() {
        return $this->belongsToMany('App\Models\jenis_kontak')->withPivot('deskripsi');
    }

    public function kons() {
        return $this->hasMany('App\Models\kontak', 'siswa_id');
    }

    public function project() {
        return $this->hasMany('App\Models\project', 'siswa_id');
    }
}
