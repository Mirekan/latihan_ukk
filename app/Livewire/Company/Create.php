<?php

namespace App\Livewire\Company;

use Livewire\Component;
use App\Models\Industri;

class Create extends Component
{
    public $name, $address, $contact, $email, $website, $bidang;
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
        $this->name = '';
        $this->address = '';
        $this->contact = '';
        $this->email = '';
        $this->website = '';
        $this->bidang = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'bidang' => 'required',
        ]);

        Industri::create([
            'nama' => $this->name,
            'alamat' => $this->address,
            'kontak' => $this->contact,
            'email' => $this->email,
            'website' => $this->website,
            'bidang_usaha' => $this->bidang,
        ]);

        session()->flash('message', value: 'Company created successfully.');
        $this->resetInputFields();
        $this->dispatch('closeModal');
    }
    public function render()
    {
        return view('livewire.company.create');
    }
}
