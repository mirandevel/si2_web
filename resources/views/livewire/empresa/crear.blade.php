<div>
    <x-jet-validation-errors class="mb-4" />

    <form wire:submit.prevent="save">
        @csrf
    {{--    <div class="mt-4 flex justify-center">
            <img  id="image" class="h-3/4 w-3/4" src="{{$photoTemp}}">
        </div>
        <div class="mt-4 flex justify-center">
            <x-jet-button id="select" type="button">Seleccionar imagen</x-jet-button>

        </div>--}}
        @if ($photo)
            Vista previa:
            <img src="{{ $photo->temporaryUrl() }}">
        @endif
        <x-jet-label for="upload" value="{{ __('Selecciona una imagen') }}" />
        <x-jet-input id="upload" type="file" wire:model="photo" class="block mt-1 w-full"/>


        @error('photo') <span class="error">{{ $message }}</span> @enderror
        <div wire:loading wire:target="photo">Cargando...</div>
        <div class="mt-4">
            <x-jet-label for="nit" value="{{ __('NIT') }}" />
            <x-jet-input id="nit" wire:model="nit" class="block mt-1 w-full" type="number" name="nit" :value="old('nit')" required autofocus/>
        </div>

        <div>
            <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
            <x-jet-input id="nombre" wire:model="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required />
        </div>




        <div class="flex items-center justify-center mt-4">
            <x-jet-button class="ml-4" id="send">
                {{ __('Guardar') }}
            </x-jet-button>
        </div>
    </form>
</div>
