<div>
    {{-- The whole world belongs to you. --}}
    <div class="flex flex-col gap-4">
        <h1 class="text-xl font-semibold">Company</h1>
        <div class="space-y-4"></div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($companies as $company)
                <div class="rounded-lg border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
                    <div class="class aspect-video bg-neutral-200 rounded-t-lg"></div>
                    <div class="p-4">
                        <h2 class="text-lg font-semibold">{{ $company->nama }}</h2>
                        <p class="text-sm text-neutral-500">{{ $company->email }}</p>
                        <p class="text-sm text-neutral-500">{{ $company->kontak }}</p>
                        <p class="text-sm text-neutral-500">{{ $company->alamat }}</p>
                        <p class="text-sm text-neutral-500">{{ $company->website }}</p>
                        <button
                            class="mt-2 inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            wire:click="edit({{ $company->id }})">
                            PKL sekarang
                        </button>
                    </div>

                </div>
            @endforeach
        </div>
        {{-- <div class="grid gap-4">
            <table class="w-full table-auto border border-gray-400 rounded-xl">
                <thead class="">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Phone</th>
                        <th class="px-4 py-2 text-left">Address</th>
                        <th class="px-4 py-2 text-left">website</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                        <tr class="border-t border-gray-400">
                            <td class="px-4 py-2">{{ $company->id }}</td>
                            <td class="px-4 py-2">{{ $company->nama }}</td>
                            <td class="px-4 py-2">{{ $company->email }}</td>
                            <td class="px-4 py-2">{{ $company->kontak }}</td>
                            <td class="px-4 py-2">{{ $company->alamat }}</td>
                            <td class="px-4 py-2">{{ $company->website }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div> --}}
    </div>
</div>
