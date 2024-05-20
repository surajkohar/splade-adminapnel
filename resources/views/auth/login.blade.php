


 <x-guest-layout>
    <div style="background-image: url('/login-image.jpg'); background-size: cover; background-position: center; min-height: 100vh; display: flex; align-items: center; justify-content: center;">

        <div class="bg-white p-4 sm:p-8 md:p-12 lg:p-16 xl:p-20 rounded-md w-full sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl"  >
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" />

            <x-splade-form action="{{ route('login') }}" class="space-y-4">
                <!-- Email Address -->
                <x-splade-input id="email" type="email" name="email" :label="__('Email')" required autofocus style="color:black" class="w-full" />
                <x-splade-input id="password" type="password" name="password" :label="__('Password')" required autocomplete="current-password" class="w-full" />
                <x-splade-checkbox id="remember_me" name="remember" :label="__('Remember me')" />

                <div class="flex items-center justify-end">
                    @if (Route::has('password.request'))
                        <Link class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </Link>
                    @endif

                    <x-splade-submit class="ml-3" :label="__('Log in')" />
                </div>
            </x-splade-form>
        </div>
    </div>
</x-guest-layout>

