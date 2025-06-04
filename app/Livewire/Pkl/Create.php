<?php

namespace App\Livewire\Pkl;

use App\Models\Guru;
use App\Models\Industri;
use App\Models\Pkl;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $siswaId, $industriId, $guruId, $mulai, $selesai, $student, $user, $industries, $teachers;
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
        $this->siswaId = '';
        $this->industriId = '';
        $this->guruId = '';
        $this->mulai = '';
        $this->selesai = '';
    }

    public function store()
    {
        $this->validate([
            'siswaId' => 'required|exists:siswas,id',
            'industriId' => 'required|exists:industris,id',
            'guruId' => 'required|exists:gurus,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        $mulaiDate = Carbon::parse($this->mulai);
        $selesaiDate = Carbon::parse($this->selesai);
        if ($mulaiDate->diffInDays($selesaiDate) < 90) {
            session()->flash('error', value: 'Lama PKL minimal 3 bulan.');
            return;
        }

        DB::beginTransaction();
        try {
            Pkl::create([
                'siswa_id' => $this->siswaId,
                'industri_id' => $this->industriId,
                'guru_id' => $this->guruId,
                'mulai' => $this->mulai,
                'selesai' => $this->selesai,
            ]);

            Siswa::where('id', $this->siswaId)->update([
                'status_lapor_pkl' => 1,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', value: 'Failed to create PKL: ' . $e->getMessage());
            return;
        }

        session()->flash('message', value: 'Laporan PKL berhasil dibuat.');
        $this->resetInputFields();
        $this->dispatch('closeModal');
    }

    public function render()
    {
        $this->user = auth('web')->user();
        $this->industries = Industri::all();
        $this->teachers = Guru::all();
        $this->student = Siswa::where('email', $this->user->email)->first();
        return view('livewire.pkl.create');
    }
}
