<?php

namespace App\Livewire\Pkl;

use App\Models\Guru;
use Livewire\Component;
use App\Models\Pkl;
use App\Models\Siswa;
use App\Models\Industri;
use Carbon\Carbon;

class Edit extends Component
{
    public $internship, $student, $industries, $teachers;
    public $siswaId, $guruId, $industriId, $mulai, $selesai;
    public function mount($pklId)
    {
        $this->internship = Pkl::findOrFail($pklId);
        $this->student = Siswa::find($this->internship->siswa_id);
        $this->industries = Industri::all();
        $this->teachers = Guru::all();
        $this->siswaId = $this->internship->siswa_id;
        $this->industriId = $this->internship->industri_id;
        $this->mulai = $this->internship->mulai;
        $this->selesai = $this->internship->selesai;
        $this->guruId    = $this->internship->guru_id;
    }
    public function render()
    {
        return view('livewire.pkl.edit');
    }

    public function update()
    {
        $this->validate([
            'siswaId' => 'required',
            'industriId' => 'required',
            'guruId' => 'required',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        $this->internship->update([
            'siswa_id' => $this->siswaId,
            'industri_id' => $this->industriId,
            'guru_id' => $this->guruId,
            'mulai' => $this->mulai,
            'selesai' => $this->selesai,
        ]);
        // as Modal

        session()->flash('message', 'Data PKL berhasil diupdate.');
        return redirect()->route('pkl.index');
    }

    public function cancel()
    {
        // $this->resetInputFields();
        $this->dispatch('closeModal');
    }

    public function resetInputFields()
    {
        $this->siswaId = '';
        $this->industriId = '';
        $this->guruId = '';
        $this->mulai = '';
        $this->selesai = '';
    }
}
