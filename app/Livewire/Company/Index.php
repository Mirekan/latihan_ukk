<?php

namespace App\Livewire\Company;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Industri;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
class Index extends Component
{
    use WithPagination;
    public $isOpen = false;
    public $search = '';
    public $listeners = ['openModal', 'closeModal'];
    public function render()
    {
        $companies = Industri::where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('alamat', 'like', '%' . $this->search . '%')
            ->orWhere('website', 'like', '%' . $this->search . '%')
            ->paginate(4);
        return view('livewire.company.index', [
            'companies' => $companies,
            'isOpen' => $this->isOpen,
        ]);
    }

    public function openModal(): void
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}
