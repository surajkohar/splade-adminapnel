<x-guest-layout>
    {{-- <x-auth-card> --}}
        <div style="background-image: url('/login-image.jpg'); background-size: cover; background-position: center; min-height: 100vh; display: flex; align-items: center; justify-content: center;">

            <div class="bg-white p-4 sm:p-8 md:p-12 lg:p-16 xl:p-20 rounded-md w-full sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl" >
        <x-splade-form action="{{ route('register') }}" class="space-y-4">
            <x-splade-input id="name" type="text" name="name" :label="__('Name')" required autofocus />
            <x-splade-input id="email" type="email" name="email" :label="__('Email')" required />
            <x-splade-input id="password" type="password" name="password" :label="__('Password')" required autocomplete="new-password" />
            <x-splade-input id="password_confirmation" type="password" name="password_confirmation" :label="__('Confirm Password')" required />

            <div class="flex items-center justify-end">
                <Link class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </Link>

                <x-splade-submit class="ml-4" :label="__('Register')" />
            </div>
        </x-splade-form>
            </div>
        </div>
    {{-- </x-auth-card> --}}
</x-guest-layout>
