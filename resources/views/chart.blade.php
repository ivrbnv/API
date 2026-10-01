<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('partials.navbar')
        </h1>
    </x-slot>
    <div>
        <div class="border-10 border-gray-300 p-4 rounded-3xl">
            <h1 class="text-center text-4xl text-[var(--text-dark)] mt-10 pb-2">Your session feedback is ready!</h1>
            <p class="text-center text-xl pb-10">Use it to understand your strengths and areas to develop.</p>
            <h1 class="text-center text-2xl font-bold">Results for {{ $session->user->name }}</h1>
            <p class="text-center text-xl">Recorded on: {{ $session->created_at->format('Y-m-d H:i') }}</p>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 mt-6">
                <div class="flex items-center justify-center">
                    <div class="max-w-xl px-4 py-10">
                        <ol class="space-y-8">
                            <li class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#ff0000] text-[var(--text-dark)] flex items-center justify-center font-semibold">1</div>
                                <div>
                                    <h3 class="font-semibold text-[var(--text-dark)]">Extremely Low</h3>
                                    <p>Very weak / needs improvement</p>
                                </div>
                            </li>

                            <li class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#ffe816] text-[var(--text-dark)] flex items-center justify-center font-semibold">2</div>
                                <div>
                                    <h3 class="font-semibold text-[var(--text-dark)]">Low</h3>
                                    <p>Not enough</p>
                                </div>
                            </li>
                            
                            <li class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#01d101] text-[var(--text-dark)] flex items-center justify-center font-semibold">3</div>
                                <div>
                                    <h3 class="font-semibold text-[var(--text-dark)]">Good</h3>
                                    <p>Balanced & effective</p>
                                </div>
                            </li>

                            <li class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#ffe816] text-[var(--text-dark)] flex items-center justify-center font-semibold">4</div>
                                <div>
                                    <h3 class="font-semibold text-[var(--text-dark)]">High</h3>
                                    <p>Too much</p>
                                </div>
                            </li>

                            <li class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#ff0000] text-[var(--text-dark)] flex items-center justify-center font-semibold">5</div>
                                <div>
                                    <h3 class="font-semibold text-[var(--text-dark)]">Extremely High</h3>
                                    <p>Excessive</p>
                                </div>
                            </li>
                        </ol>

                        <div class="max-w-4xl mx-auto px-4 mt-10">
                            <h2 class="text-2xl mb-5 text-[var(--text-dark)]">The radar chart shows your performance in these core areas:</h2>
                            <div class="grid grid-cols-1 gap-4">
                                <p class="text-[var(--text-dark)]"><strong>Pitch level:</strong> How high or low your voice sounded</p>
                                <p class="text-[var(--text-dark)]"><strong>Pitch variability:</strong> How much your pitch changed</p>
                                <p class="text-[var(--text-dark)]"><strong>Articulation:</strong> How clearly you pronounced words</p>
                                <p class="text-[var(--text-dark)]"><strong>Energy:</strong> How lively or calm your delivery was</p>
                                <p class="text-[var(--text-dark)]"><strong>Pauses:</strong> How natural or disruptive your pauses were</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <div class="w-full max-w-2xl lg:max-w-3xl aspect-square">
                        <canvas id="radarChart"></canvas>
                    </div>
                </div>
            </div>
            <div>
                <div class="max-w-4xl mx-auto px-4 py-10 text-2xl font-medium text-center text-[var(--text-dark)]">
                    You can find ways to improve in the
                        <a href="{{ route('tips') }}"
                        class="hover:text-[var(--button-bg-hover)] transition-colors">PRACTICE TIPS</a>
                    section.                
                </div>
            </div>
        </div>
        
        <script src="{{ asset('js/Chart.min.js') }}"></script>
        <script>
            const sessionData = @json($session);

            const labels = ['Pitch level', 'Pitch variability', 'Articulation', 'Energy', 'Pauses'];
            const dataValues = [
                sessionData.meanF0,
                sessionData.F0std,
                sessionData.meanF1,
                sessionData.H1minusA3,
                sessionData.pauseCount
            ];

            // Function to calculate responsive font sizes
            const getResponsiveFontSize = (baseSize) => {
                const width = window.innerWidth;
                if (width < 640) return Math.round(baseSize * 0.6);      // mobile: 60%
                if (width < 1024) return Math.round(baseSize * 0.8);     // tablet: 80%
                return baseSize;                                          // desktop: 100%
            };

            // Function to calculate responsive point sizes
            const getResponsivePointSize = (baseSize) => {
                const width = window.innerWidth;
                if (width < 640) return Math.round(baseSize * 0.7);
                if (width < 1024) return Math.round(baseSize * 0.85);
                return baseSize;
            };

            document.fonts.ready.then(() => {
                Chart.defaults.font.family = 'Poppins';

                const ctx = document.getElementById('radarChart').getContext('2d');
                const chart = new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Session Value',
                            data: dataValues,
                            backgroundColor: 'rgba(7, 7, 7, 0.6)',
                            borderColor: 'rgba(14, 16, 14, 1)',
                            borderWidth: 1,
                            pointBackgroundColor: '#020302ff',
                            pointRadius: getResponsivePointSize(8),    
                            pointHoverRadius: getResponsivePointSize(12) 
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                enabled: true
                            }
                        },
                        scales: {
                            r: {
                                min: 0,
                                max: 5,
                                ticks: {
                                    stepSize: 1,
                                    font: { 
                                        family: 'Poppins', 
                                        size: getResponsiveFontSize(16) 
                                    },
                                    showLabelBackdrop: false
                                },
                                pointLabels: {
                                    font: {
                                        family: 'Poppins',
                                        size: getResponsiveFontSize(24)
                                    }
                                },
                                grid: {
                                    circular: true
                                }
                            }
                        }
                    },
                    plugins: [
                        {
                            id: 'zoneBackground',
                            beforeDraw: (chart) => {
                                const { ctx, scales } = chart;
                                const rScale = scales.r;
                                const centerX = rScale.xCenter; 
                                const centerY = rScale.yCenter;

                                const zones = [
                                    { max: 1, color: 'rgba(255, 0, 0, 1)' },       
                                    { max: 2, color: 'rgba(255, 232, 22, 1)' },     
                                    { max: 3, color: 'rgba(1, 209, 1, 1)' },      
                                    { max: 4, color: 'rgba(255, 232, 22, 1)' },     
                                    { max: 5, color: 'rgba(255, 0, 0, 1)' }        
                                ];

                                for (let i = zones.length - 1; i >= 0; i--) {
                                    const zone = zones[i];
                                    const radius = (zone.max / rScale.max) * rScale.drawingArea;
                                    ctx.beginPath();
                                    ctx.arc(centerX, centerY, radius, 0, Math.PI * 2);
                                    ctx.fillStyle = zone.color;
                                    ctx.fill();
                                }
                            }
                        }
                    ]
                });

                // Handle window resize
                let resizeTimeout;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(() => {
                        // Update font sizes
                        chart.options.scales.r.pointLabels.font.size = getResponsiveFontSize(24);
                        chart.options.scales.r.ticks.font.size = getResponsiveFontSize(16);
                        
                        // Update point sizes
                        chart.data.datasets[0].pointRadius = getResponsivePointSize(8);
                        chart.data.datasets[0].pointHoverRadius = getResponsivePointSize(12);
                        
                        chart.update();
                    }, 250); // Debounce resize events
                });
            });
        </script>
    </div>
</x-app-layout>