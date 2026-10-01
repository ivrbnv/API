<link rel="stylesheet" href="{{ asset('css/apps.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('partials.navbar')
        </h1>
    </x-slot>
     <div class="flex justify-center items-center min-h-[85vh] px-6 md:px-20 lg:px-40 mt-10 mb-10"> <!--style="font-family: 'Poppins';"-->
        <div class="w-full max-w-5xl bg-white border border-gray-500 text-[var(--text-dark)] rounded-3xl shadow-md p-8 md:p-12">
            <div class="flex flex-col justify-center items-center text-center mb-10">
                <img src="{{ asset('images/7.svg') }}" alt="image" class="w-24 mb-6">
                <p class="text-2xl md:text-4xl font-medium mb-4">Setup your practice session</p>
                <p class="text-lg md:text-2xl text-gray-500">
                    Set your estimated practice time to help track your progress
                </p>
            </div>
            <form action="{{ route('session.startsetup') }}" method="POST" class="w-full">
                @csrf

                <div class="flex flex-col md:flex-row gap-8 mb-4">
                    <div class="flex-1">
                        <label for="minutes" class="block text-lg md:text-2xl font-semibold mb-2">
                            Minutes
                        </label>
                        <input required type="text" id="minutes" name="minutes"
                            class="rounded-xl bg-gray-100 w-full h-14 text-xl md:text-2xl px-4"
                            placeholder="Please insert minutes (e.g. 5)">
                    </div>

                    <div class="flex-1">
                        <label for="second" class="block text-lg md:text-2xl font-semibold mb-2">
                            Seconds
                        </label>
                        <input type="text" id="second" name="second"
                            class="rounded-xl bg-gray-100 w-full h-14 text-xl md:text-2xl px-4"
                            placeholder="Please insert seconds (e.g. 30)">
                    </div>
                </div>

                <p class="text-base md:text-xl text-[#8D99AE] mt-2 mb-10 text-center">
                    Recommended: at least one minute for best results
                </p>
                <div class="mb-10">
                    <p class="text-xl md:text-2xl font-medium mb-4">What the Audience Reactor analyzes:</p>

                    <div class="space-y-6">
                        <div class="flex flex-col md:flex-row justify-between gap-6">
                            <div class="flex items-center">
                                <img src="{{ asset('images/13.svg') }}" alt="image" class="w-16 mr-3">
                                <div>
                                    <p class="text-lg md:text-2xl font-medium">Tone & Clarity</p>
                                    <p class="text-base md:text-xl text-[#8D99AE]">Voice quality and articulation</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <img src="{{ asset('images/2.svg') }}" alt="image" class="w-16 mr-3">
                                <div>
                                    <p class="text-lg md:text-2xl font-medium">Pace & Rhythm</p>
                                    <p class="text-base md:text-xl text-[#8D99AE]">Speaking speed and pauses</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <img src="{{ asset('images/11.svg') }}" alt="image" class="w-16 mr-3">
                            <div>
                                <p class="text-lg md:text-2xl font-medium">Confidence Level</p>
                                <p class="text-base md:text-xl text-[#8D99AE]">Vocal strength and energy</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="flex items-center justify-center gap-3 bg-[#9EE493] hover:bg-[#7eda70] transition-colors rounded-xl w-full md:w-2/3 h-16 text-xl md:text-2xl font-medium text-gray-800">
                        <img src="{{ asset('images/9.svg') }}" alt="image" class="w-8">
                        Start practice session now
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>