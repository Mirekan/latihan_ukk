<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use Livewire\Component;

class Index extends Component
{
    public $teachers;
    public $search = '';
    public function render()
    {
        $this->teachers = Guru::where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('nip', 'like', '%' . $this->search . '%')
            // ->orderBy('nama', 'asc')
            ->get();

        return view('livewire.guru.index');
    }
}
