<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
body {
    font-family: 'Poppins', sans-serif;
}
</style>
</head>

<body class="h-screen flex items-center justify-center bg-gradient-to-br from-[#5a0f1c] via-[#7a1c2e] to-[#a8324a]">

<!-- Blur Background -->
<div class="absolute inset-0 backdrop-blur-[6px]"></div>

<!-- Card -->
<div class="relative z-10 w-[360px] pt-16 pb-8 px-8 rounded-2xl
    bg-gradient-to-b from-white/10 to-white/5
    backdrop-blur-xl border border-white/20
    shadow-2xl text-white text-center">

    <!-- Icon -->
    <div class="absolute -top-12 left-1/2 -translate-x-1/2">
        <div class="w-24 h-24 bg-[#5a0f1c] rounded-full flex items-center justify-center border-4 border-white/20 shadow-lg text-2xl">
            👤
        </div>
    </div>

    <!-- FORM -->
    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <div class="bg-white/20 rounded-md px-4 py-2 flex items-center">
                <span class="mr-2">👤</span>
                <input type="email" name="email" value="{{ old('email') }}"
                    required autofocus
                    placeholder="Email ID"
                    class="w-full bg-transparent outline-none text-white placeholder-white/70 text-center">
            </div>

            @error('email')
                <p class="text-red-300 text-sm mt-1 text-center">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <div class="bg-white/20 rounded-md px-4 py-2 flex items-center">
                <span class="mr-2">🔒</span>
                <input type="password" name="password"
                    required
                    placeholder="Password"
                    class="w-full bg-transparent outline-none text-white placeholder-white/70 text-center">
            </div>

            @error('password')
                <p class="text-red-300 text-sm mt-1 text-center">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember & Forgot -->
        <div class="flex justify-between items-center text-sm text-white/80">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember" class="accent-[#7a1c2e]">
                Remember me
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="hover:underline">
                    Forgot Password?
                </a>
            @endif
        </div>

        <!-- Button -->
        <button type="submit"
            class="w-full bg-[#5a0f1c] hover:bg-[#7a1c2e] py-2 rounded-md font-semibold tracking-wide shadow-lg transition">
            LOGIN
        </button>

    </form>

</div>

</body>
</html>