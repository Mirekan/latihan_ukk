<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-md flex-col gap-2 p-4 py-8">
                <div class="flex flex-col gap-4">
                    <div class="flex justify-center" wire:loading.remove>
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('logo-stembayo.png') }}" alt="Logo" class="w-36 h-36">
                        </a>
                    </div>
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
