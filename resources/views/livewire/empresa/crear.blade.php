


    <x-jet-validation-errors class="mb-4" />

    <form wire:submit.prevent="save">
        @csrf
        <div class="mt-4">
            <x-jet-label for="nit" value="{{ __('NIT') }}" />
            <x-jet-input id="nit" wire:model="nit" class="block mt-1 w-full" type="number" name="nit" :value="old('nit')" required autofocus/>
        </div>
        <div>
            <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
            <x-jet-input id="nombre" wire:model="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required />
        </div>
        <div>
            <x-jet-label for="photo" value="{{ __('Imagen') }}" />
            <x-jet-input id="photo" wire:model="photo" class="block mt-1 w-full" type="file" name="photo" required accept="image/*"/>
            <div wire:loading wire:target="photo" class="text-sm text-gray-500 italic">Uploading...</div>
        </div>




        <div class="flex items-center justify-center mt-4">
            <x-jet-button class="ml-4">
                {{ __('Guardar') }}
            </x-jet-button>
        </div>
    </form>

