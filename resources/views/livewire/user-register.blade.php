    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form wire:submit.prevent="submit">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" wire:model="nombre" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email"  wire:model="email"  class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" wire:model="password"  class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>


            <div class="mt-4 ">
                <x-jet-label for="pais" value="{{'Pais'}}" />
                <select id="pais" wire:model="pais_id" name="pais" class="form-select mt-1 block w-full border-paleta-4 border-2 rounded-md">
                    @foreach($paises as $pais)
                    <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4 ">
                <x-jet-label for="ciudad" value="{{'Ciudad'}}" />
                <select id="ciudad" wire:model="ciudad_id" name="ciudad" class="form-select mt-1 block w-full border-paleta-4 border-2 rounded-md">
                    @foreach($ciudades as $ciudad)
                        <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                    @endforeach
                </select>
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
