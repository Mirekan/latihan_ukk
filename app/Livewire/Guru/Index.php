<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {
        $teachers = Guru::where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('nip', 'like', '%' . $this->search . '%')
            // ->orderBy('nama', 'asc')
            ->paginate(5);

        return view(
            'livewire.guru.index',
            [
                'teachers' => $teachers,
            ]
        );
    }
}
