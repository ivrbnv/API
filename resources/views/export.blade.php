<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('partials.navbar')
        </h1>
    </x-slot>
    <div class="flex justify-center items-center">
        <div class="mt-20">
            <p class="text-center text-8xl font-semibold">JSON opened in new tab.</p>
        </div>
        <script>
            window.open("{{ url('/export-new') }}", "_blank");
        </script>
    </div>
</x-app-layout>
