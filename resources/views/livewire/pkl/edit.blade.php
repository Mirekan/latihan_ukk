<div class="p-4">
    <h2 class="text-lg font-semibold">Buat Laporan PKL</h2>
    <form wire:submit="update" class="mt-4 space-y-4 flex flex-col gap-4">
        <select wire:model="siswaId" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <option value="">Pilih Siswa</option>
            <option value="{{ $student->id }}">{{ $student->nama }}</option>
        </select>
        <select wire:model="industriId" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <option value="">Pilih Industri</option>
            @foreach ($industries as $industry)
                <option value="{{ $industry->id }}">{{ $industry->nama }}</option>
            @endforeach
        </select>
        <select wire:model="guruId" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <option value="">Pilih Guru</option>
            @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
            @endforeach
        </select>
        <div class="flex gap-4">
            <div class="flex-1">
                <label for="mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" wire:model="mulai" id="mulai" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="flex-1">
                <label for="selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                <input type="date" wire:model="selesai" id="selesai" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
        </div>
        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Save</button>
            <button type="button" wire:click="cancel" class="ml-2 px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600">Cancel</button>
        </div>
    </form>
</div>
