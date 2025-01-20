<x-guest-layout>
    <div class="mb-4 text-sm text-black">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="btn btn-secondary">
                <strong>{{ __('Email Password Reset Link') }}</strong>
            </button>
        </div>
    </form>
    <form action="{{ route('password.email') }}" method="post">
        @csrf
        <input type="hidden" name="email" id="email" value="{{ auth()->user()->email }}">
        <button type="submit" class="btn btn-primary ms-2 mt-5">Reset password</button>
    </form>
</x-guest-layout>
