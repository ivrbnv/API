<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('partials.navbar')
        </h1>
    </x-slot>
    <div class="flex justify-center items-center min-h-[85vh] mt-10 px-6 md:px-20 lg:px-40"> <!-- style="font-family: 'Poppins';" -->
        <div class="w-full max-w-4xl bg-white rounded-3xl shadow-md p-8 md:p-12 text-center">
            <p class="text-2xl md:text-4xl mb-4 text-gray-800">
                Speaking Session
            </p>
            <p class="text-base md:text-xl text-gray-500 mb-10">
                Click start when you're ready. The Audience Reactor will analyze your speech in real-time.
            </p>
            <img src="{{ asset('images/8.svg') }}" alt="image" class="w-32 md:w-44 mx-auto mb-8 mt-6">
            <p class="text-xl md:text-3xl text-gray-800 mb-2">Ready to Start</p>
            <p class="text-base md:text-xl mb-8">
                Press the button below to begin your session
            </p>
            <div class="flex justify-center items-center gap-3 bg-[#9EE493] hover:bg-[#7eda70] transition-colors rounded-xl w-full md:w-1/2 mx-auto h-16 mb-12">
                <img src="{{ asset('images/9.svg') }}" alt="image" class="w-8">
                <a href="{{ route('session.startsession') }}" class="text-xl md:text-2xl text-gray-800">
                    Start Recording
                </a>
            </div>
            <div class="bg-gray-100 rounded-2xl px-6 py-8 text-left">
                <p class="text-xl md:text-2xl mb-3">Tips for a great session:</p>
                <ul class="list-disc ml-6 space-y-2">
                    <li class="text-base md:text-xl">Find a quiet environment with minimal background noise</li>
                    <li class="text-base md:text-xl">Speak naturally as if you're presenting to a real audience</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>