<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Record a voice sample</title>
    <meta name="description" content="We measure your charisma from a voice sample you submit. It takes less than 5 minutes.">

    <link href="https://fonts.bunny.net/css?family=roboto:400,500,700|rubik:500,600" rel="stylesheet">
    @vite(['resources/css/app.css'])

    {{-- Colour placeholders: swap in the real values from your original CSS --}}
    <style>
        :root {
            --main: #4f5665;
            --java: #1ea69b;
            --mango: #fdd695;
            --grey: #4f5665;
            --surface: #f8f9fa;
            --footer: #0b1220;
        }
        body { font-family: "Roboto", system-ui, sans-serif; }
        .font-display { font-family: "Rubik", system-ui, sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">

@php
    $ideal = ['1–3 minutes long', 'Recorded at a normal volume', 'Spoken as freely as possible', 'Your natural way of speaking'];
    $avoid = ['Dialogues between people', 'Background or interfering noise', 'Very quiet recordings', 'Very loud recordings'];
    $notes = [
        'Ideally, choose a topic or situation that best reflects your personal speaking or presenting style.',
        'We analyse how your recording sounds. The content of your voice sample is not evaluated.',
    ];
@endphp

{{-- Navigation (mobile menu uses a CSS-only checkbox toggle) --}}
<header class="relative bg-white shadow-md">
    <nav class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
        <a href="{{ url('/') }}"><img src="{{ asset('images/logo-dark.svg') }}" alt="Logo" width="149" height="29"></a>

        <input type="checkbox" id="nav-toggle" class="peer sr-only">
        <label for="nav-toggle" class="cursor-pointer rounded p-2 hover:bg-gray-100 xl:hidden">
            <span class="sr-only">Toggle navigation</span>
            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </label>

        <ul class="absolute left-0 top-full z-20 hidden w-full flex-col items-center bg-white py-4 shadow-md
                   peer-checked:flex xl:static xl:flex xl:w-auto xl:flex-row xl:py-0 xl:shadow-none">
            @foreach (['Analysis', 'Seminars', 'News', 'About us', 'Train the Trainer'] as $label)
                <li><a href="#" class="block px-3 py-2 text-gray-600 hover:text-gray-900">{{ $label }}</a></li>
            @endforeach
        </ul>
    </nav>
</header>

<main>
    {{-- Hero --}}
    <section class="bg-gradient-to-b from-white to-[var(--surface)]">
        <div class="mx-auto grid max-w-6xl items-end gap-8 px-4 pt-12 lg:grid-cols-2">
            <div class="self-center pb-8">
                <h1 class="font-display mb-3 text-4xl font-semibold leading-tight">How do I record a suitable voice sample?</h1>
                <p class="text-[var(--grey)]">
                    We measure your charisma from a voice sample you submit. Further down this page you can record a sample
                    or upload one. The whole process takes less than five minutes.
                </p>
            </div>
            <img src="{{ asset('images/avp.png') }}" alt="" class="h-auto w-full max-w-lg justify-self-center lg:order-2">
        </div>
    </section>

    {{-- Do / avoid / notes --}}
    <section class="bg-[var(--surface)] pt-8">
        <div class="mx-auto max-w-6xl px-4">
            <div class="grid gap-x-10 md:grid-cols-2">
                <div class="mb-10">
                    <h2 class="font-display mb-3 text-2xl font-semibold">The ideal voice sample</h2>
                    <ul class="space-y-2">
                        @foreach ($ideal as $item)
                            <li class="flex items-center gap-3 rounded-xl bg-[var(--java)] p-4 text-white shadow-sm">
                                <img src="{{ asset('images/circle_check.svg') }}" alt="" class="size-5 shrink-0">{{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mb-10">
                    <h2 class="font-display mb-3 text-2xl font-semibold">What to avoid</h2>
                    <ul class="space-y-2">
                        @foreach ($avoid as $item)
                            <li class="flex items-center gap-3 rounded-xl bg-[var(--mango)] p-4 font-bold shadow-sm">
                                <img src="{{ asset('images/off_close.svg') }}" alt="" class="size-5 shrink-0">{{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="pb-12">
                <h2 class="font-display mb-3 text-2xl font-semibold">Please note</h2>
                <ul class="grid gap-2 md:grid-cols-2">
                    @foreach ($notes as $item)
                        <li class="flex items-center gap-3 rounded-xl bg-[var(--main)] p-4 text-white shadow-sm">
                            <img src="{{ asset('images/circle_info.svg') }}" alt="" class="size-5 shrink-0">{{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- Call to action --}}
    <section id="start" class="bg-[var(--surface)] pb-24 pt-4">
        <div class="mx-auto max-w-6xl px-4">
            <div class="flex justify-center rounded-xl bg-white p-8 shadow-sm">
                <a href="#" {{-- point this at your recording form route --}}
                   class="rounded-lg bg-[var(--java)] px-6 py-3 text-sm font-medium uppercase tracking-wide text-white shadow-md transition hover:brightness-110">
                    Continue to recording
                </a>
            </div>
            <div class="mt-8 max-w-xl">
                <span class="font-display inline-block rounded bg-[var(--java)] px-2 py-1 text-white">Still have questions?</span>
                <p class="my-2 text-[var(--grey)]">
                    We're happy to help you record a voice sample. The best way to reach us is by email
                    (<a href="mailto:contact@allgoodspeakers.com" class="underline">contact@allgoodspeakers.com</a>).
                </p>
            </div>
        </div>
    </section>
</main>

{{-- Footer --}}
<footer class="bg-[var(--footer)] text-gray-300">
    <div class="mx-auto flex max-w-6xl flex-col gap-8 px-4 py-12 md:flex-row md:justify-between">
        <div>
            <img src="{{ asset('images/logo-white.svg') }}" alt="Logo" width="240" height="46" loading="lazy">
            <a href="https://www.allgoodspeakers.com/" target="_blank" rel="noopener" class="mt-3 block text-sm hover:text-white">
                A project of AllGoodSpeakers ApS
            </a>
        </div>
        <ul class="space-y-1 text-sm">
            <li><a class="hover:text-white" href="#">Legal notice</a></li>
            <li><a class="hover:text-white" href="#">Privacy policy</a></li>
            <li><a class="hover:text-white" href="mailto:contact@allgoodspeakers.com">Contact</a></li>
        </ul>
    </div>
    <div class="border-t border-white/10 px-4 py-4 text-center text-sm text-gray-500">&copy; {{ date('Y') }}</div>
</footer>

</body>
</html>