<div>
    {{-- The whole world belongs to you. --}}
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('message') }}
        </div>
    @endif
    <div class="flex flex-col gap-2">
        <h2 class="text-lg p-2 self-start w-full">
            Daftar Laporan PKL
        </h2>
        <div class="flex gap-4">
            <div class="flex-1">
                <input type="text" wire:model.live="search" placeholder="Search..." class="w-full px-4 py-2 border border-gray-400 rounded-lg">
            </div>
            <button wire:click="openModal" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                Buat Laporan PKL
            </button>
        </div>
        <div class="grid gap-4 mt-4">
            <table class="w-full table-auto border border-gray-400 rounded-xl">
                <thead class="">
                    <tr class="border-b border-gray-400">
                        <th class="px-4 py-2 text-left border-e border-gray-400">Nama</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">Industri</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">Guru</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">Mulai</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($internships as $index => $internship)
                        <tr class="border-t border-gray-400" style="cursor: pointer;" wire:click='openEdit({{ $internship->id }})'>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $internship->siswa->nama }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $internship->industri->nama }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $internship->guru->nama }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $internship->mulai }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $internship->selesai }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center">Belum ada data pengumpulan PKL</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if ($isOpen)
        <div class="fixed inset-0 backdrop-blur-xs flex items-center justify-center z-50 " x-data="{ open: @entangle('isOpen') }" x-show="open" x-cloak>
            <div class="w-full max-w-lg p-6 rounded shadow-lg relative bg-gray-50 ">
                <livewire:pkl.create />
            </div>
        </div>
    @endif
    @if ($isEdit)
        <div class="fixed inset-0 backdrop-blur-xs flex items-center justify-center z-50 " x-data="{ open: @entangle('isEdit') }" x-show="open" x-cloak>
            <div class="w-full max-w-lg p-6 rounded shadow-lg relative bg-gray-50 ">
                <livewire:pkl.edit :pklId="$pklId" />
            </div>
        </div>
    @endif
</div>
