<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex flex-col gap-2">
        <h2 class="text-lg border-b p-2">
            Input Laporan PKL Anda
        </h2>
        <div class="p">
            @if ($siswa->status_lapor_pkl)
                <p class="text-sm">Status: <span class="font-semibold text-green-400">Sudah mngumpulkan laporan PKL</span></p>
            @else
                <p class="text-sm">Status: <span class="font-semibold text-red-400">Belum Mengumpulkan laporan PKL</span></p>
            @endif
        </div>
        <div></div>
    </div>
</div>
