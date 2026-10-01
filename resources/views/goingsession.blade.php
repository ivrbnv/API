<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('partials.navbar')
        </h1>
    </x-slot>
    <div class="flex justify-center items-center min-h-[85vh] mt-10 px-6 md:px-20 lg:px-40">  <!--style="font-family: 'Poppins';"-->
        <div class="w-full max-w-4xl bg-white rounded-3xl shadow-md p-8 md:p-12 text-center">
            
            {{-- Title --}}
            <p class="text-2xl md:text-4xl mb-4 text-gray-800">Practice Session</p>
            <p class="text-base md:text-xl text-gray-500 mb-10">
                Get ready for your speech. Stand in front of the Audience Reactor. Recording of your speech will start after the sound. 
            </p>

            <div class="relative inline-block mb-10">
                <img src="{{ asset('images/10.svg') }}" alt="Recording Image" class="w-32 md:w-44 mx-auto rounded-3xl">
                <div class="flex items-center justify-center gap-2 bg-[#9EE493] text-gray-800 font-semibold rounded-full px-4 py-1 shadow-sm">
                    <span class="font-bold text-3xl">•</span>
                    <span class="text-base md:text-lg tracking-wide">PREPARE</span>
                </div>
            </div>

            {{-- Timer --}}
            <div>
                <p id="timer" class="text-2xl md:text-3xl mb-6"></p>
                <script>
                    let timeLeft = 10; // we have to get here what user inserted now it's hardcoded
                    function startTimer() {
                        const timerDisplay = document.getElementById('timer');
                        const interval = setInterval(() => {
                            let minutes = parseInt(timeLeft / 60, 10);
                            let seconds = parseInt(timeLeft % 60, 10);
                            minutes = minutes < 10 ? "0" + minutes : minutes;
                            seconds = seconds < 10 ? "0" + seconds : seconds;
                            timerDisplay.textContent = timeLeft > 0 
                                ? `${minutes}:${seconds}`
                                : "Speak now!";
                            timeLeft--;
                            if (timeLeft < 0) clearInterval(interval);
                        }, 1000);
                    }
                    window.onload = startTimer;
                </script>
            </div>

            {{-- Stop Practice Button --}}
            <div class="flex justify-center items-center gap-3 bg-[#344966] transition-colors rounded-xl w-full md:w-1/2 mx-auto h-16 mb-4">
                <img src="{{ asset('images/7.svg') }}" alt="Stop Icon" class="w-8">
                <a href="{{ route('session.stopsession') }}" class="text-xl md:text-2xl text-white font-semibold">
                    View results
                </a>
            </div>

        </div>
    </div>
</x-app-layout>