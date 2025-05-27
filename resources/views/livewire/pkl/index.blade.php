<div>
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
                <div class="block bg-green-100 font-semibold text-green-400 p-4 rounded-lg w-full">Anda Sudah Mengumpulkan Laporan PKL</div>
            @else
                <div class="block bg-red-100 font-semibold text-red-400 p-4 rounded-lg w-full">Anda Belum Mengumpulkan laporan PKL</div>
            @endif
        </div>
        <div>
            @if ($siswa->status_lapor_pkl)
                @if(!$isEditing)
                    <div class="flex flex-col gap-4">
                        <div class="flex">
                            <div>
                                <h3 class="text-lg font-semibold">Laporan PKL Anda</h3>
                            <p class="text-sm text-gray-500">Update Terakhir:  <span class="font-semibold">{{ $pkl->updated_at->format('d M Y H:i') }}</span></p>
                            </div>
                            <div class="ml-auto">
                                <button wire:click="editMode"
                                        class="bg-blue-400 hover:bg-blue-500 text-white px-4 py-2 rounded-md">
                                    Edit Laporan PKL
                                </button>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-md border border-gray-300 md:min-h-48">
                            <p class="text-sm">{{ $pkl->laporan }}</p>
                        </div>
                    </div>
                @else
                    <form wire:submit.prevent="updateReport" class="flex flex-col gap-4">
                        <label for="laporan">Edit Laporan PKL Anda</label>

                        <textarea wire:model="laporan"
                                id="laporan"
                                class="border border-gray-300 text-sm rounded-md p-1 md:h-36"
                                required>{{ $pkl->laporan  }}</textarea>

                        <button type="submit"
                                class="bg-gray-400 hover:bg-gray-500 text-white py-1 rounded-md cursor-pointer">
                            Update
                        </button>
                    </form>
                @endif
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
