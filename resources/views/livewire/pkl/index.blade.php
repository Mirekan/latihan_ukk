<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex flex-col gap-2">
        <h2 class="text-lg border-b p-2 self-start w-full">
            Input Laporan PKL Anda
        </h2>
        <div class="p">
            @if ($siswa->status_lapor_pkl)
                <div class="block bg-green-100 font-semibold text-green-400 p-4 rounded-lg w-full">Laporan PKL Anda sudah terkirim</div>
            @else
                <div class="block bg-red-100 font-semibold text-red-400 p-4 rounded-lg w-full">Anda Belum Mengumpulkan laporan PKL</div>
            @endif
        </div>
        <div>
            @if ($siswa->status_lapor_pkl)
                {{-- to do --}}
                <div class="flex flex-col gap-4">
                    <label for="laporan" class="text-lg block">Laporan PKL Anda</label>
                    <p>{{$pkl->laporan}}</p>
                    <button type="button" wire:click='edit' class="bg-gray-400 hover:bg-gray-500 text-white py-1 rounded-md cursor-pointer">Edit</button>
                </div>
            @else
            <form wire:submit.prevent="addReport" class="flex flex-col gap-4">
                <label for="laporan">Tuliskan laporan PKL Anda di sini</label>

                <textarea wire:model="laporan"
                          id="laporan"
                          class="border border-gray-300 text-sm rounded-md p-1 md:h-36"
                          required></textarea>

                <button type="submit"
                        class="bg-gray-400 hover:bg-gray-500 text-white py-1 rounded-md cursor-pointer">
                    Kirim
                </button>
            </form>
            @endif
        </div>
    </div>
</div>
