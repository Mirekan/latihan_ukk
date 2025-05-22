<?php

namespace App\Livewire;

use App\Models\Industri;
use App\Models\Pkl;
use App\Models\Siswa;
use Livewire\Component;

class Dashboard extends Component
{
    public $user, $siswa, $guru, $industri, $role, $pkl;

    public function render()
    {
        $this->user = auth('web')->user();
        $this->siswa = Siswa::where('email', $this->user->email)->first();
        $this->role = $this->user->roles->first();
        $this->industri = Industri::where('id', $this->siswa->pkl->pluck('industri_id'))->first();

        return view('livewire.dashboard', [
            'user' => $this->user,
            'siswa' => $this->siswa,
            'role' => $this->role,
            'pkl' => $this->pkl,
        ]);
    }
}
