<?php

namespace App\Livewire\Pkl;

use App\Models\Industri;
use App\Models\Pkl;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $isOpen = false;
    public $isEdit = false;
    public $pklId;
    // public $internships;
    public $user;
    public $siswa_login, $siswa_pkl;
    public $search = '';
    public $listeners = ['openModal', 'closeModal', 'openEdit', 'closeEdit'];
    public function render()
    {
        $this->user = auth('web')->user();
        $this->siswa_login = Siswa::with('pkl')->where('email', $this->user->email)->first();
        $this->siswa_pkl = $this->siswa_login->pkl->first();
        $internships = Pkl::with(['siswa', 'industri'])
            ->whereHas('siswa', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('industri', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->paginate(5);
        return view('livewire.pkl.index', [
            'internships' => $internships,
        ]);
    }
    public function openModal(): void
    {
        $this->isOpen = true;
    }
    public function openEdit($id): void
    {
        $this->pklId = $id;
        $this->isEdit = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->isEdit = false;
    }
}
