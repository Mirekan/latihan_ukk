<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="p-4">
        <h2 class="text-lg font-semibold">Create Company</h2>
        <form wire:submit.prevent="save" class="mt-4 space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" id="name" wire:model.defer="name" class="mt-2 block
                    w-full
                    rounded-md
                    border
                    border-gray-300
                    sm:text-lg" />
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="text" id="email" wire:model.defer="email" class="mt-2 block
                    w-full
                    rounded-md
                    border
                    border-gray-300
                    sm:text-lg" />
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" id="name" wire:model.defer="name" class="mt-2 block
                    w-full
                    rounded-md
                    border
                    border-gray-300
                    sm:text-lg" />
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" id="name" wire:model.defer="name" class="mt-2 block
                    w-full
                    rounded-md
                    border
                    border-gray-300
                    sm:text-lg" />
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Save</button>
                <button type="button" wire:click="cancel" class="ml-2 px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600">Cancel</button>
            </div>

        </form>
    </div>
</div>
{{-- The whole world belongs to you. --}}
