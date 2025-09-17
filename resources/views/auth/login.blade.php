@extends('layouts.app')

@section('title', 'Login')

@section('content')
<section class="bg-gray-50 min-h-screen flex items-center justify-center">
    <!-- login container -->
    <div class="bg-gray-100 flex rounded-2xl shadow-lg w-[85%] py-16 items-center">
        <!-- form -->
        <div class="md:w-1/2 px-8 md:px-16">
            <h2 class="font-normal text-3xl text-black">Login</h2>
            <p class="text-xs mt-4 text-black">If you are already a member, easily log in</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4">
                @csrf
                <!-- Email Input -->
                <div>
                    <input class="p-2 mt-8 rounded-xl border w-full" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password Input -->
                <div class="relative">
                    <input class="p-2 rounded-xl border w-full" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                    </svg>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember_me" name="remember" class="w-4 h-4 shrink-0 border-gray-300 rounded-sm text-indigo-600 focus:ring-indigo-500">
                    <label for="remember_me" class="text-gray-900 ml-2 text-sm">Remember Me</label>
                </div>

                <button type="submit" class="bg-black rounded-xl text-white py-2 hover:scale-105 duration-300">Login</button>
            </form>

            <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
                <hr class="border-gray-400">
                <p class="text-center text-sm">OR</p>
                <hr class="border-gray-400">
            </div>

            @if(Route::has('register'))
            <div class="mt-3 text-xs flex justify-between items-center text-black">
                <p>Don't have an account?</p>
                <a href="{{ route('register') }}" class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Register</a>
            </div>
            @endif

            @if (Route::has('password.request'))
            <div class="mt-5 text-xs border-b border-black py-4 text-black">
                <a href="{{ route('password.request') }}" class="hover:underline">Forgot your password?</a>
            </div>
            @endif
        </div>

        <!-- image -->
        <div class="md:block hidden w-1/2">
            <img class="rounded-2xl h-full object-cover" src="/images/img-1.jpg" alt="Login Image">

        </div>
    </div>
</section>

<script>
    // Add password visibility toggle
    document.querySelector('.bi-eye').addEventListener('click', function() {
        const passwordInput = document.querySelector('input[name="password"]');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.setAttribute('fill', '#002D74');
        } else {
            passwordInput.type = 'password';
            this.setAttribute('fill', 'gray');
        }
    });
</script>
@endsection