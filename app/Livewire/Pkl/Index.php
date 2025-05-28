<?php

namespace App\Livewire\Pkl;

use App\Models\Industri;
use App\Models\Pkl;
use App\Models\Siswa;
use Livewire\Component;

class Index extends Component
{
    public $isOpen = false;
    public $isEdit = false;
    public $pklId;
    public $internships;
    public $user;
    public $siswa_login;
    public $search = '';
    public $listeners = ['openModal', 'closeModal', 'openEdit', 'closeEdit'];
    public function render()
    {
        $this->user = auth('web')->user();
        $this->siswa_login = Siswa::with('pkl')->where('email', $this->user->email)->first();
        $this->internships = Pkl::with(['siswa', 'industri'])
            ->whereHas('siswa', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('industri', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->get();
        return view('livewire.pkl.index');
    }
    public function openModal(): void
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
    // public function openEdit()
    // {
    //     $this->isEdit = true;
    // }
    // public function closeEdit()
    // {
    //     $this->isEdit = false;
    // }
}
