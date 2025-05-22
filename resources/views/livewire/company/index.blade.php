<div>
    {{-- The whole world belongs to you. --}}
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('message') }}
        </div>
    @endif
    <div class="flex flex-col gap-2">
        <h2>List of companies</h2>
        <div class="flex gap-4">
            <div class="flex-1">
                <input type="text" wire:model.live="search" placeholder="Search..." class="w-full px-4 py-2 border border-gray-400 rounded-lg">
            </div>
            <div>
                <button wire:click="openModal" class="px-4 py-2 text-white bg-gray-500 rounded-lg">Add Company</button>
            </div>
        </div>
        <div class="grid gap-4 mt-4">
            <table class="w-full table-auto border border-gray-400 rounded-xl">
                <thead class="">
                    <tr>
                        <th class="px-4 py-2 text-left border-e border-gray-400">ID</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">Name</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">Email</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">Phone</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">Address</th>
                        <th class="px-4 py-2 text-left border-e border-gray-400">website</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($companies as $index => $company)
                        <tr class="border-t border-gray-400">
                            <td class="px-4 py-2 border-e border-gray-400">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $company->nama }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $company->email }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $company->kontak }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $company->alamat }}</td>
                            <td class="px-4 py-2 border-e border-gray-400">{{ $company->website }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center">No companies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if ($isOpen)
        <div class="fixed inset-0 backdrop-blur-xs flex items-center justify-center z-50 " x-data="{ open: @entangle('isOpen') }" x-show="open" x-cloak>
            <div class="bg-neutral-800 w-full max-w-lg p-6 rounded shadow-lg relative">
                <!-- Dynamically include the Create component here -->
                <livewire:company.create />
            </div>
        </div>
    @endif
</div>
