<?php

namespace App\Livewire\Company;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Industri;

#[Layout('components.layouts.app')]
class Index extends Component
{
    public $isOpen = false;
    public $companyId, $companyName, $companyAddress, $companyContact, $companyEmail, $companyWebsite;
    public $listeners = ['openModal', 'closeModal'];


    public function render()
    {
        $companies = Industri::paginate(10);
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
