<?php

namespace App\Livewire\Pkl;

use App\Models\Industri;
use App\Models\Siswa;
use Livewire\Component;

class Index extends Component
{
    public $isOpen = false;
    public $pkl, $industri, $guru, $siswa, $role, $user, $laporan;
    public function render()
    {
        $this->user = auth('web')->user();
        $this->siswa = Siswa::where('email', $this->user->email)->first();
        $this->role = $this->user->roles->first();
        $this->industri = Industri::where('id', $this->siswa->pkl->pluck('industri_id'))->first();
        $this->pkl = $this->siswa->pkl->first();
        // dd($this->pkl->laporan);

        return view('livewire.pkl.index', [
            'pkl' => $this->pkl,
            'industri' => $this->industri,
            'guru' => $this->guru,
            'siswa' => $this->siswa,
            'role' => $this->role,
            'user' => $this->user,
        ]);
    }

    public function addReport()
    {
        $this->validate([
            'laporan' => 'required',
        ]);

        $this->siswa = Siswa::where('email', $this->user->email)->first();
        $this->pkl = $this->siswa->pkl->first();

        $this->pkl->update([
            'laporan' => $this->laporan,
        ]);

        $this->siswa->update([
            'status_lapor_pkl' => 1,
        ]);

        session()->flash('message', value: 'Laporan berhasil ditambahkan');
    }

    public function edit()
    {
        // $this->siswa = Siswa::where('email', $this->user->email)->first();
        // $this->siswa->update([
        //     'status_lapor_pkl' => 0,
        // ]);


    }
}
