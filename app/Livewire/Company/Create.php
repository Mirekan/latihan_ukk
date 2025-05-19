<?php

namespace App\Livewire\Company;

use Livewire\Component;
use App\Models\Industri;

class Create extends Component
{
    public $companyId, $companyName, $companyAddress, $companyContact, $companyEmail, $companyWebsite;
    public function mount()
    {
        $this->resetInputFields();
    }

    public function cancel()
    {
        $this->resetInputFields();
        $this->dispatch('closeModal');
    }

    public function resetInputFields()
    {
        $this->companyId = '';
        $this->companyName = '';
        $this->companyAddress = '';
        $this->companyContact = '';
        $this->companyEmail = '';
        $this->companyWebsite = '';
    }

    public function store()
    {
        $this->validate([
            'companyName' => 'required',
            'companyAddress' => 'required',
            'companyContact' => 'required',
            'companyEmail' => 'required|email',
            'companyWebsite' => 'required|url',
        ]);

        Industri::updateOrCreate(['id' => $this->companyId], [
            'nama' => $this->companyName,
            'alamat' => $this->companyAddress,
            'kontak' => $this->companyContact,
            'email' => $this->companyEmail,
            'website' => $this->companyWebsite,
        ]);

        session()->flash('message', $this->companyId ? 'Company updated successfully.' : 'Company created successfully.');
    }
    public function render()
    {
        return view('livewire.company.create');
    }
}
