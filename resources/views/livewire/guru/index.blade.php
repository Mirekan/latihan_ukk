<div>
    {{-- The whole world belongs to you. --}}
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('message') }}
        </div>
    @endif
    <div class="flex flex-col gap-2">
        <h2 class="text-lg p-2 self-start w-full">
            Daftar Guru
        </h2>
        <div class="flex gap-4">
            <div class="flex-1">
                <input type="text" wire:model.live="search" placeholder="Search..." class="w-full px-4 py-2 border border-gray-400 rounded-lg">
            </div>
            <div>
            </div>
        </div>
        <div class="grid gap-4 mt-4">
            <table class="w-full table-auto border border-gray-400 rounded-xl">
                <thead class="">
                    <tr class="border-b border-gray-400">
                        <th class="px-4 py-2 text-left border-e border-gray-400">Nama</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">Email</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">Kontak</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">Alamat</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">NIP</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $index => $teacher)
                        <tr class="border-t border-gray-400">
                            <td class="px-4 py-2 border-e border-gray-400">{{ $teacher->nama }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $teacher->email }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $teacher->kontak }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $teacher->alamat }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $teacher->nip }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center">Tidak ada data guru</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
