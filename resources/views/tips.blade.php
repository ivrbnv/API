<link rel="stylesheet" href="{{ asset('css/apps.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('partials.navbar')
        </h1>
    </x-slot>
    <div class="justify-center items-center min-h-[85vh] px-6 md:px-20 lg:px-40 mt-10"> <!--style="font-family: 'Poppins', sans-serif;"-->
        <div class="top-icon justify-center flex">
            <img src="/images/6.svg" width="100" height="100" alt="Top icon" />
        </div>
        <h1 class="text-4xl text-center h-auto leading-tight pt-2 justify-center max-w-6xl mx-auto text-[var(--text-dark)]"> Practice Tips
        </h1>
            <p class = "text-xl text-center justify-center max-w-6xl mx-auto pt-5"> 
                Master the art of public speaking with our expert guidance
            </p>
            
                <div class="grid gap-8 grid-cols-1 md:grid-cols-2 pt-5 items-start text-left px-6 mb-10">
                    
                    <div class="bg-[#EDF2F4] rounded-2xl shadow-sm p-6 px-10 border border-black-100 transition-shadow mt-7 md:col-span-2">
                        <ul class="space-y-4">   
                            <li class="flex items-start">
                            <img src="/images/13.svg" alt="Bulb" class="w-6 h-6 mr-3 mt-1">
                            <span class="text-xl text-[var(--text-dark)]">Essential Practice Guidelines
                            </span>
                            </li>
                        </ul>
                        <p class="text-xl text-gray-400">Follow these core principles for every practice session</p>
                        
                        <div class="grid grid-cols-1 pt-10 gap-5">
                            <!-- <div class="bg-white rounded-lg p-6">
                                <ul class="space-y-4">   
                                    <li class="flex items-start">
                                    <img src="/images/14.svg" alt="Check" class="w-5 h-5 mr-3 mt-1">
                                    <span>
                                    <p class="text-xl text-[var(--text-dark)]">Choose a quiet environment</p>
                                    <p class="text-lg pt-1">Minimize background noise and distractions.
                                     A quiet space allows the Audience Reactor to accurately analyze your speech patterns.</p>
                                    </span>
                                    </li>
                                </ul>
                            </div> -->
                            <div class="bg-white rounded-lg p-6">
                                <ul class="space-y-4">   
                                    <li class="flex items-start">
                                    <img src="/images/14.svg" alt="Check" class="w-5 h-5 mr-3 mt-1">
                                    <span>
                                    <p class="text-xl text-[var(--text-dark)]">Practice for 2-3 minutes minimum</p>
                                    <p class="text-lg pt-1">Shorter sessions may not provide enough data for meaningful analysis. 
                                    Aim for at least 2-3 minutes per practice session.</p>
                                    </span>
                                    </li>
                                </ul>
                                
                            </div>
                            <div class="bg-white rounded-lg p-6">
                                <ul class="space-y-4">   
                                    <li class="flex items-start">
                                    <img src="/images/14.svg" alt="Check" class="w-5 h-5 mr-3 mt-1">
                                    <span>
                                    <p class="text-xl text-[var(--text-dark)]">Speak naturally and confidently</p>
                                    <p class="text-lg pt-1">Don't overthink it. Speak as you would to a real audience. 
                                    Authenticity is key to improvement.</p>
                                    </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="bg-white rounded-lg p-6">
                                <ul class="space-y-4">   
                                    <li class="flex items-start">
                                    <img src="/images/14.svg" alt="Check" class="w-5 h-5 mr-3 mt-1">
                                    <span>
                                    <p class="text-xl text-[var(--text-dark)]">Review feedback after each session</p>
                                    <p class="text-lg pt-1">Take time to understand the feedback and identify areas for improvement. 
                                    Progress comes from consistent review and adjustment.</p>
                                    </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#EDF2F4] rounded-2xl shadow-sm p-6 border border-black-100 transition-shadow">
                        <img src="/images/8.svg" alt="Mic" class="w-12 h-12 mr-3 mt-1 mb-4">
                        <p class="text-xl text-[var(--text-dark)]">Voice Quality </p>
                        <p class="text-xl text-gray-400"> Optimize your vocal delivery</p>
                        <ul class="list-disc marker:text-[#9EE493] pl-5 pt-5 space-y-2">
                            <li>Warm up your voice before practicing</li>
                            <li>Maintain consistent volume throughout</li>
                            <li>Enunciate clearly, especially consonants</li>
                            <li>Vary your pitch to maintain engagement</li>
                        </ul> 
                    </div>

                    <div class="bg-[#EDF2F4] rounded-2xl shadow-sm p-6 border border-black-100 transition-shadow">
                        <img src="/images/7.svg" alt="Clock" class="w-12 h-12 mr-3 mt-1 mb-4">
                        <p class="text-xl text-[var(--text-dark)]">Pacing & Rythm </p>
                        <p class="text-xl text-gray-400"> Control your speaking tempo</p>
                        <ul class="list-disc marker:text-[#9EE493] pl-5 pt-5 space-y-2">
                            <li>Speak at a moderate, steady pace</li>
                            <li>Use strategic pauses for ephasis</li>
                            <li>Don't rush through important points</li>
                            <li>Allow times for ideas to sink in</li>
                        </ul>
                    </div>

                   <div class="bg-[#EDF2F4] rounded-2xl shadow-sm p-6 border border-black-100 transition-shadow">
                        <img src="/images/3.svg" alt="Speaker" class="w-12 h-12 mr-3 mt-1 mb-4">
                        <p class="text-xl text-[var(--text-dark)]">Confidence Building </p>
                        <p class="text-xl text-gray-400"> Project authority and presence</p>
                        <ul class="list-disc marker:text-[#9EE493] pl-5 pt-5 space-y-2">
                            <li>Stand or sit with good posture</li>
                            <li>Practice regularly to build comfort</li>
                            <li>Record yourself to track progress</li>
                            <li>Celebrate small improvements</li>
                        </ul> 
                    </div>

                    <div class="bg-[#EDF2F4] rounded-2xl shadow-sm p-6 border border-black-100 transition-shadow">
                        <img src="/images/11.svg" alt="Improvement" class="w-12 h-12 mr-3 mt-1 mb-4">
                        <p class="text-xl text-[var(--text-dark)]">Continuous Improvement </p>
                        <p class="text-xl text-gray-400"> Track and enhance your skills</p>
                        <ul class="list-disc marker:text-[#9EE493] pl-5 pt-5 space-y-2">
                            <li>Set specific goals for each session</li>
                            <li>Focus on one skill at a time</li>
                            <li>Compare feedback over multiple sessions</li>
                            <li>Apply learnings to real presentations</li>
                        </ul>
                    </div>
                
                    <div class="bg-[#EDF2F4] rounded-2xl shadow-sm p-6 px-10 border border-black-100 transition-shadow md:col-span-2"> 
                        <li class="flex items-start">
                            <img src="/images/15.svg" alt="Exclamation" class="w-6 h-6 mr-3 mt-1">
                            <span class="text-xl text-[var(--text-dark)]">Common Mistakes to Avoid </span>
                        </li>
                        <p class="text-xl text-gray-400 pt-2"> Watch out for these pitfalls that can hinder your progress</p>
                        <ul class="pt-5">
                            <li class="flex items-start">
                            <img src="/images/16.svg" alt="Cross" class="w-6 h-6 mr-3 mt-1">
                                <span class = "text-[var(--text-dark)]">Practicing in noisy environments
                                    <p class="text-sm text-gray-400">Background noise can affect analysis accuracy</p>
                                </span>
                            </li>
                            <li class="flex items-start">
                            <img src="/images/16.svg" alt="Cross" class="w-6 h-6 mr-3 mt-1">
                                <span class = "text-[var(--text-dark)]">Ignoring feedback patterns
                                    <p class="text-sm text-gray-400">Repeated suggestions indicate areas needing attention</p>
                                </span>
                            </li>
                            <li class="flex items-start">
                            <img src="/images/16.svg" alt="Cross" class="w-6 h-6 mr-3 mt-1">
                                <span class = "text-[var(--text-dark)]">Rushing through sessions
                                    <p class="text-sm text-gray-400">Quality over quantity leads to better results</p>
                                </span>
                            </li>
                            <li class="flex items-start">
                            <img src="/images/16.svg" alt="Cross" class="w-6 h-6 mr-3 mt-1">
                                <span class = "text-[var(--text-dark)]">Not applying insights to real situations
                                    <p class="text-sm text-gray-400">Practice should translate to real-world improvement</p>
                                </span>
                            </li>
                        </ul>
                    </div>
                
                </div>
    </div>
</x-app-layout>