<div>   
    <x-danger-button wire:click="$set('open', true)">
        Crear Nuevo Coche
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo Coche
        </x-slot>

        <x-slot name="content">
            {{--     
            <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen Cargando!</strong>
                <span class="block sm:inline">Espere un momento mientras se procesa la imagen</span>
            </div>

            @if($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}">
            @endif
            --}}
            <div class="mb-4">
                <x-label value="Patente" />
                <x-input type="text" class="w-full" wire:model="nro"/>

                <x-input-error for="nro" />    
            </div>    
            
            <div class="mb-4">
                    <label for="tipo_coche_id">Tipo :</label>
                    <select id="tipo_coche_id" wire:change="asigna_tipo_coche($event.target.value)">
                        <option value="">Seleccione tipo Coche</option>
                        
                            @foreach ($tipoco as $t)
                            <option value="{{ $t->id }}">{{ $t->tipo }}</option>
                            @endforeach
                        
                    </select>
                <x-input-error for="tipo_coche_id" />
            </div> 
           
        </x-slot>         
           
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                Crear Coche
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>
</div>