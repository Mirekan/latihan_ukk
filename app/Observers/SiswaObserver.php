<?php

namespace App\Observers;

use App\Models\Siswa;
use App\Models\User;

class SiswaObserver
{
    /**
     * Handle the Siswa "created" event.
     */
    public function created(Siswa $siswa): void
    {
        //
        $user = User::create([
            'name' => $siswa->nama,
            'email' => $siswa->email,
            'password' => bcrypt($siswa->nis),
            // 'role' => 'siswa',
        ]);

        $user->assignRole('siswa');
    }

    /**
     * Handle the Siswa "updated" event.
     */
    public function updated(Siswa $siswa): void
    {
        //
        $user = User::where('email', $siswa->email)->first();
        if ($user) {
            $user->update([
                'name' => $siswa->nama,
                'email' => $siswa->email,
            ]);
        } else {
            $user = User::create([
                'name' => $siswa->nama,
                'email' => $siswa->email,
                'password' => bcrypt($siswa->nis),
                'role' => 'siswa',
            ]);
            $user->assignRole('siswa');
        }
    }

    /**
     * Handle the Siswa "deleted" event.
     */
    public function deleted(Siswa $siswa): void
    {
        //
        $user = User::where('email', $siswa->email)->first();
        if ($user) {
            $user->delete();
        } else {
            return;
        }
    }

    /**
     * Handle the Siswa "restored" event.
     */
    public function restored(Siswa $siswa): void
    {
        //
    }

    /**
     * Handle the Siswa "force deleted" event.
     */
    public function forceDeleted(Siswa $siswa): void
    {
        //
    }
}
