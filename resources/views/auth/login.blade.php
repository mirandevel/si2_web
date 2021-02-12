<x-guest-layout>

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" >
            @csrf

            <div>
                <x-jet-label for="email" class="text-black text-base" value="{{ __('Correo') }}" />
                <x-jet-input id="email" class="block mt-1 w-full focus:ring-0 focus:border-paleta-4" type="email" name="email" placeholder="Escriba su correo" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" class="text-black text-base" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full focus:ring-0 focus:border-paleta-4" type="password" name="password" placeholder="Escriba su contraseña"  required autocomplete="current-password" />
                <div class="flex justify-end mt-1">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-paleta-4 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
                </div>
            </div>


            <div class="flex justify-center mt-4">
                <x-jet-button >
                    {{ __('Login') }}
                </x-jet-button>
            </div>
            <div class="flex justify-center mt-2">
                    <a class="underline text-sm text-paleta-4 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Crear cuenta') }}
                    </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
