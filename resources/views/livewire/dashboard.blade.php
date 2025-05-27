<div class="h-full w-full flex-1 flex flex-col gap-4 rounded-xl items-center justify-center">
    <div class="p-2 border-b border-gray-400 text-center">
        <h1 class="text-2xl">Status Siswa</h1>
    </div>
    <div class="grid md:grid-cols-2 gap-4">
        <div class="p-4 gap-2 flex flex-col shadow-sm shadow-black/60 rounded-md">
            <h1 class="text-xl border-b">Status PKL Anda</h1>
            <h2 class="text-sm">Perusahaan : <span class="text-base font-semibold">{{ $industri->nama }}</span></h2>
            <h2 class="text-sm">Email : <span class="text-base font-semibold">{{ $industri->email }}</span></h2>
            <h2 class="text-sm">No. Telepon : <span class="text-base font-semibold">{{ $industri->kontak }}</span></h2>
            @if ($siswa->status_lapor_pkl)
                <p class="text-sm ">Status: <span class="font-semibold text-green-400">Sudah mengumpulkan laporan PKL</span></p>
            @else
                <p class="text-sm">Status: <span class="font-semibold text-red-400">Belum Mengumpulkan laporan PKL</span></p>
            @endif
        </div>
        <div class="p-4 gap-2 flex flex-col shadow-sm shadow-black/60 rounded-md">
            <h1 class="text-xl border-b">Selamat Datang, {{ $user->name }}</h1>
            <div class="flex flex-col gap-1">
                <p class="text-sm">Anda adalah <span class="text-base font-semibold">{{ $role->name }}</span></p>
                <p class="text-sm">NIS: <span class="text-base font-semibold">{{ $siswa->nis }}</span></p>
                <p class="text-sm">Alamat: <span class="text-base font-semibold">{{ $siswa->alamat }}</span></p>
                <p class="text-sm">Email: <span class="text-base font-semibold">{{ $siswa->email }}</span></p>
                <p class="text-sm">No. Telepon: <span class="text-base font-semibold">{{ $siswa->kontak }}</span></p>
            </div>
        </div>
    </div>
</div>
