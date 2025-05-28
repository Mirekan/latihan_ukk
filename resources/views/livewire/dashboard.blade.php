<div class="h-full w-full flex-1 flex flex-col gap-4 rounded-xl">
    {{-- <div class="grid md:grid-cols-2 gap-4">
        @if ($role->name == 'super_admin')
            <div class="p-4 gap-2 col-span-2 flex flex-col shadow-sm shadow-black/60 rounded-md">
                <h1 class="text-2xl ">Selamat Datang, {{ $user->name }}</h1>
            </div>
        @else
            <div class="p-4 gap-2 flex flex-col shadow-sm shadow-black/60 rounded-md">
                <h1 class="text-lg font-semibold border-b">Selamat Datang, {{ $user->name }}</h1>
                <div class="flex flex-col gap-1">
                    <p class="text-sm">Anda adalah <span class="text-base font-semibold">{{ $role->name }}</span></p>
                    <p class="text-sm">NIS: <span class="text-base font-semibold">{{ $siswa->nis }}</span></p>
                    <p class="text-sm">Alamat: <span class="text-base font-semibold">{{ $siswa->alamat }}</span></p>
                    <p class="text-sm">Email: <span class="text-base font-semibold">{{ $siswa->email }}</span></p>
                    <p class="text-sm">No. Telepon: <span class="text-base font-semibold">{{ $siswa->kontak }}</span></p>
                </div>
            </div>
        @endif
    </div> --}}
    <div class="flex flex-col gap-4">
        <h1 class="text-xl font-semibold border-b">Selamat Datang, {{ $user->name }}</h1>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="container-sm border border-gray-300 rounded-md p-4 col-span-2">
                <h2 class="text-lg font-semibold mb-2">Informasi Siswa</h2>
                <div class="flex flex-col gap-1">
                    <p class="text-sm">NIS: <span class="text-base">{{ $siswa->nis }}</span></p>
                    <p class="text-sm">Alamat: <span class="text-base">{{ $siswa->alamat }}</span></p>
                    <p class="text-sm">Email: <span class="text-base">{{ $siswa->email }}</span></p>
                    <p class="text-sm">No. Telepon: <span class="text-base">{{ $siswa->kontak }}</span></p>
                </div>
            </div>
            <div class="container-sm flex flex-col border border-gray-300 rounded-md p-4">
                <h2 class="text-lg font-semibold">Cek Daftar Guru</h2>
                <p class="text-sm mb-2">Untuk melihat daftar guru, silakan klik tombol di bawah ini.</p>
                <a href="{{ route('guru.index') }}" class="bg-gray-500 font-semibold py-1 px-4 text-sm w-fit rounded hover:bg-gray-600 transition duration-200">Lihat Daftar Guru</a>
            </div>
            <div class="container-sm flex flex-col border border-gray-300 rounded-md p-4">
                <h2 class="text-lg font-semibold">Cek Daftar Industri</h2>
                <p class="text-sm mb-2">Untuk melihat daftar Industri, silakan klik tombol di bawah ini.</p>
                <a href="{{ route('company.index') }}" class="bg-gray-500 font-semibold py-1 px-4 text-sm w-fit rounded hover:bg-gray-600 transition duration-200">Lihat Daftar Industri</a>
            </div>
            <div class="container-sm border border-gray-300 rounded-md p-4 col-span-2">
                <h2 class="text-lg font-semibold mb-2">Status Laporan PKL</h2>
                <div class="flex flex-col gap-1">
                    @if ($siswa->status_lapor_pkl)
                        <p class="text-sm">Status: <span class="text-base font-semibold text-green-600">Sudah Mengumpulkan Laporan</span></p>
                        <a href="{{ route('pkl.index') }}" class="bg-gray-500 font-semibold py-1 px-4 text-sm w-fit rounded hover:bg-gray-600 transition duration-200">Lihat Laporan PKL</a>
                    @else
                        <p class="text-sm">Status: <span class="text-base font-semibold text-red-600">Belum Mengumpulkan Laporan</span></p>
                        <a href="{{ route('pkl.index') }}" class="bg-gray-500 font-semibold py-1 px-4 text-sm w-fit rounded hover:bg-gray-600 transition duration-200">Buat Laporan PKL</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
