<?php

namespace App\Livewire\Company;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Industri;

#[Layout('components.layouts.app')]
class Index extends Component
{
    public function render()
    {
        $companies = Industri::paginate(10);
        return view('livewire.company.index', [
            'companies' => $companies,
        ]);
    }
}
