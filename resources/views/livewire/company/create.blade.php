    <div class="p-4">
        <h2 class="text-lg font-semibold">Tambah Industri Baru</h2>
        <form wire:submit="store" class="mt-4 space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium">Nama Industri</label>
                <input type="text" id="name" wire:model.defer="name" class="mt-2 block
                    w-full
                    rounded-md
                    border
                    border-gray-300
                    sm:text-lg
                    ps-2" />
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="bidang" class="block text-sm font-medium">Bidang Industri</label>
                <input type="text" id="bidang" wire:model.defer="bidang" class="mt-2 block
                    w-full
                    rounded-md
                    border
                    border-gray-300
                    sm:text-lg
                    ps-2" />
                @error('bidang') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="text" id="email" wire:model.defer="email" class="mt-2 block
                    w-full
                    rounded-md
                    border
                    border-gray-300
                    sm:text-lg
                    ps-2" />
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="contact" class="block text-sm font-medium">Telepon</label>
                <input type="text" id="contact" wire:model.defer="contact" class="mt-2 block
                    w-full
                    rounded-md
                    border
                    border-gray-300
                    sm:text-lg
                    ps-2" />
                @error('contact') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="address" class="block text-sm font-medium">Alamat</label>
                <input type="text" id="address" wire:model.defer="address" class="mt-2 block
                    w-full
                    rounded-md
                    border
                    border-gray-300
                    sm:text-lg
                    ps-2" />
                @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="website" class="block text-sm font-medium">Website</label>
                <input type="text" id="website" wire:model.defer="website" class="mt-2 block
                    w-full
                    rounded-md
                    border
                    border-gray-300
                    sm:text-lg
                    ps-2" />
                @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Save</button>
                <button type="button" wire:click="cancel" class="ml-2 px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600">Cancel</button>
            </div>

        </form>
    </div>
