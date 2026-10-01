<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin: 15px;
        cursor: pointer;
        transition: 0.2s;
        background-color: #9EE493
    }
    .card:hover {
        background-color: #7eda70;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('partials.navbar')
        </h1>
    </x-slot>
    <div class="font-Poppins p-6">
        <h2 class="text-4xl font-bold text-center mt-5 mb-12">My Sessions</h2>

        @foreach($sessions as $session)
            <div class="card" onclick="window.location='{{ route('result.show', $session->id) }}'">
                <p class="text-xl"><strong>User:</strong> {{ $session->user->name }}</p>
                <p class="text-xl"><strong>Date:</strong> {{ $session->created_at->format('Y-m-d H:i') }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>