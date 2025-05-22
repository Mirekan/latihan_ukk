<?php

namespace App\Observers;

use App\Models\Guru;
use App\Models\User;

class GuruObserver
{
    /**
     * Handle the Guru "created" event.
     */
    public function created(Guru $guru): void
    {
        //
        $user = Guru::create([
            'name' => $guru->nama,
            'email' => $guru->email,
            'password' => bcrypt($guru->nis),
            'role' => 'guru',
        ]);

        $user->assignRole('guru');
    }

    /**
     * Handle the Guru "updated" event.
     */
    public function updated(Guru $guru): void
    {
        //
        $user = User::where('email', $guru->email)->first();
        if ($user) {
            $user->update([
                'name' => $guru->nama,
                'email' => $guru->email,
            ]);
        } else {
            $user = User::create([
                'name' => $guru->nama,
                'email' => $guru->email,
                'password' => bcrypt($guru->nip),
                'role' => 'guru',
            ]);
            $user->assignRole('guru');
        }
    }

    /**
     * Handle the Guru "deleted" event.
     */
    public function deleted(Guru $guru): void
    {
        //
        $user = User::where('email', $guru->email)->first();
        if ($user) {
            $user->delete();
        } else {
            return;
        }
    }

    /**
     * Handle the Guru "restored" event.
     */
    public function restored(Guru $guru): void
    {
        //
    }

    /**
     * Handle the Guru "force deleted" event.
     */
    public function forceDeleted(Guru $guru): void
    {
        //
    }
}
