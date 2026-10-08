<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submit your voice sample</title>
    <link href="https://fonts.bunny.net/css?family=roboto:400,500,700|rubik:500,600" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        :root { --main:#1f2a44; --java:#0f766e; --mango:#fcd9a0; --grey:#6b7280; --surface:#f8f9fa; }
        body { font-family: "Roboto", system-ui, sans-serif; }
        .font-display { font-family: "Rubik", system-ui, sans-serif; }
    </style>
</head>
<body class="bg-[var(--surface)] text-gray-900 antialiased">

<header class="bg-white shadow-md">
    <div class="mx-auto flex max-w-3xl items-center px-4 py-4">
        <a href="{{ route('voice-sample') }}"><img src="{{ asset('images/logo-dark.svg') }}" alt="Logo" width="149" height="29"></a>
    </div>
</header>

<main class="mx-auto max-w-3xl px-4 py-10">

@if (session('sent'))
    <div class="rounded-xl bg-white p-8 text-center shadow-sm">
        <h1 class="font-display mb-2 text-3xl font-semibold">Thank you!</h1>
        <p class="text-[var(--grey)]">We've received your voice sample and will get back to you by email.</p>
    </div>
@else
    <h1 class="font-display mb-2 text-3xl font-semibold">Submit your voice sample</h1>
    <p class="mb-8 text-[var(--grey)]">Tell us a little about yourself, then record or upload your sample (1–3 minutes).</p>

    <form id="sample-form" method="POST" action="{{ route('voice-sample.send') }}" enctype="multipart/form-data"
          class="space-y-6 rounded-xl bg-white p-6 shadow-sm md:p-8" novalidate>
        @csrf

        {{-- Personal details --}}
        <div class="grid gap-4 md:grid-cols-2">
            <div class="md:col-span-2">
                <label for="name" class="mb-1 block text-sm font-medium">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autocomplete="name"
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-[var(--java)] focus:outline-none focus:ring-2 focus:ring-[var(--java)]/30">
                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="age" class="mb-1 block text-sm font-medium">Age</label>
                <input id="age" name="age" type="number" min="1" max="120" value="{{ old('age') }}" required
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-[var(--java)] focus:outline-none focus:ring-2 focus:ring-[var(--java)]/30">
                @error('age') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="gender" class="mb-1 block text-sm font-medium">Gender</label>
                <select id="gender" name="gender" required
                        class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 focus:border-[var(--java)] focus:outline-none focus:ring-2 focus:ring-[var(--java)]/30">
                    <option value="" disabled @selected(!old('gender'))>Please choose</option>
                    @foreach (['female' => 'Female', 'male' => 'Male', 'diverse' => 'Non-binary / diverse', 'no_answer' => 'Prefer not to say'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('gender') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
                @error('gender') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label for="email" class="mb-1 block text-sm font-medium">Email address</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-[var(--java)] focus:outline-none focus:ring-2 focus:ring-[var(--java)]/30">
                @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Record or upload --}}
        <div>
            <p class="mb-2 text-sm font-medium">Your voice sample</p>

            <div class="mb-4 grid grid-cols-2 gap-2 rounded-lg bg-gray-100 p-1 text-sm font-medium">
                <button type="button" id="tab-record" class="rounded-md bg-white px-3 py-2 shadow-sm">Record now</button>
                <button type="button" id="tab-upload" class="rounded-md px-3 py-2 text-gray-600">Upload a file</button>
            </div>

            {{-- Record panel --}}
            <div id="panel-record" class="rounded-lg border border-dashed border-gray-300 p-6 text-center">
                <p id="rec-timer" class="font-display mb-4 text-3xl tabular-nums">0:00</p>
                <div class="flex justify-center gap-2">
                    <button type="button" id="rec-start"
                            class="rounded-lg bg-[var(--java)] px-5 py-2 text-sm font-medium text-white hover:brightness-110">Start recording</button>
                    <button type="button" id="rec-stop" hidden
                            class="rounded-lg bg-red-600 px-5 py-2 text-sm font-medium text-white hover:brightness-110">Stop</button>
                </div>
                <p id="rec-status" class="mt-3 text-sm text-[var(--grey)]">Speak naturally, at normal volume.</p>
            </div>

            {{-- Upload panel (this input is also what the recording is placed into) --}}
            <div id="panel-upload" hidden class="rounded-lg border border-dashed border-gray-300 p-6">
                <input id="audio" name="audio" type="file" accept="audio/*,.m4a,.mp3,.wav,.webm,.ogg"
                       class="block w-full text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-[var(--java)] file:px-4 file:py-2 file:text-sm file:font-medium file:text-white hover:file:brightness-110">
                <p class="mt-2 text-sm text-[var(--grey)]">MP3, WAV, M4A, OGG or WebM, up to 20&nbsp;MB.</p>
            </div>

            <audio id="preview" controls hidden class="mt-4 w-full"></audio>
            <p id="audio-error" class="mt-2 text-sm text-red-600" @if(!$errors->has('audio')) hidden @endif>{{ $errors->first('audio') }}</p>
        </div>

        {{-- Consent --}}
        <div>
            <label class="flex items-start gap-3 text-sm">
                <input type="checkbox" name="consent" value="1" required @checked(old('consent'))
                       class="mt-1 size-4 rounded border-gray-300 accent-[var(--java)]">
                <span>I agree that my details and voice recording may be used to analyse my voice and contact me about the result. See our <a href="#" class="underline">privacy policy</a>.</span>
            </label>
            @error('consent') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <button id="submit-btn" type="submit"
                class="w-full rounded-lg bg-[var(--java)] px-6 py-3 text-sm font-medium uppercase tracking-wide text-white shadow-md transition hover:brightness-110 disabled:opacity-50">
            Send voice sample
        </button>
    </form>
@endif
</main>

<script>
(() => {
    const $ = id => document.getElementById(id);
    const form = $('sample-form');
    if (!form) return;

    const input = $('audio'), preview = $('preview'), errorEl = $('audio-error');
    const MAX_SECONDS = 300;
    let recorder, stream, chunks = [], timerId, seconds = 0;

    const fmt = s => `${Math.floor(s / 60)}:${String(s % 60).padStart(2, '0')}`;
    const showError = msg => { errorEl.textContent = msg; errorEl.hidden = !msg; };

    function clearAudio() {
        input.value = '';
        preview.hidden = true;
        preview.removeAttribute('src');
        $('rec-timer').textContent = '0:00';
    }

    function showPreview(file) {
        preview.src = URL.createObjectURL(file);
        preview.hidden = false;
    }

    // Tabs
    function setTab(mode) {
        const rec = mode === 'record';
        $('panel-record').hidden = !rec;
        $('panel-upload').hidden = rec;
        $('tab-record').className = 'rounded-md px-3 py-2 ' + (rec ? 'bg-white shadow-sm' : 'text-gray-600');
        $('tab-upload').className = 'rounded-md px-3 py-2 ' + (rec ? 'text-gray-600' : 'bg-white shadow-sm');
        if (recorder && recorder.state === 'recording') recorder.stop();
        clearAudio();
        showError('');
    }
    $('tab-record').onclick = () => setTab('record');
    $('tab-upload').onclick = () => setTab('upload');

    // Uploaded file
    input.addEventListener('change', () => {
        showError('');
        const f = input.files[0];
        if (!f) return clearAudio();
        if (f.size > 20 * 1024 * 1024) { clearAudio(); return showError('That file is larger than 20 MB.'); }
        showPreview(f);
    });

    // Recording
    $('rec-start').onclick = async () => {
        showError('');
        if (!navigator.mediaDevices || !window.MediaRecorder) {
            return showError('Recording is not supported in this browser. Please upload a file instead.');
        }
        try {
            stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        } catch {
            return showError('We could not access your microphone. Please allow access or upload a file instead.');
        }

        const type = ['audio/webm;codecs=opus', 'audio/mp4', 'audio/ogg;codecs=opus']
            .find(t => MediaRecorder.isTypeSupported(t)) || '';
        recorder = new MediaRecorder(stream, type ? { mimeType: type } : undefined);
        chunks = [];
        recorder.ondataavailable = e => e.data.size && chunks.push(e.data);
        recorder.onstop = () => {
            clearInterval(timerId);
            stream.getTracks().forEach(t => t.stop());
            const mime = recorder.mimeType || 'audio/webm';
            const ext = mime.includes('mp4') ? 'm4a' : mime.includes('ogg') ? 'ogg' : 'webm';
            const file = new File(chunks, `voice-sample.${ext}`, { type: mime });
            const dt = new DataTransfer();
            dt.items.add(file);
            input.files = dt.files;          // the recording is submitted like a normal upload
            showPreview(file);
            $('rec-start').hidden = false;
            $('rec-start').textContent = 'Record again';
            $('rec-stop').hidden = true;
            $('rec-status').textContent = 'Listen back below, or record again.';
        };

        clearAudio();
        recorder.start();
        seconds = 0;
        timerId = setInterval(() => {
            $('rec-timer').textContent = fmt(++seconds);
            if (seconds >= MAX_SECONDS) recorder.stop();
        }, 1000);
        $('rec-start').hidden = true;
        $('rec-stop').hidden = false;
        $('rec-status').textContent = 'Recording…';
    };
    $('rec-stop').onclick = () => recorder && recorder.state === 'recording' && recorder.stop();

    // Submit
    form.addEventListener('submit', e => {
        if (!input.files.length) {
            e.preventDefault();
            return showError('Please record or upload a voice sample first.');
        }
        $('submit-btn').disabled = true;
        $('submit-btn').textContent = 'Sending…';
    });
})();
</script>
</body>
</html>
