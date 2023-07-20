<div>
    {{-- <a href="{{route('coches.edit',$coche)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
    <a class="btn btn-green" wire:click="$set('open', true)">
        <i class="fas fa-edit"></i>
    </a>    

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar Coche 
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen Cargando!</strong>
                <span class="block sm:inline">Espere un momento mientras se procesa la imagen</span>
            </div>

            @if($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}">
            
            @else
                <img class="mb-4" src="{{Storage::url('app/'.$coche->image)}}">

            @endif

            <div class="mb-4">
                <x-label value="Detalle del Coche" />
                <textarea wire:model="coche.detalle" class="form-control w-full" rows="6" ></textarea>

                <x-input-error for="detalle" />    
            </div>    

            <div class="mb-4">
                <x-label value="Capacidad de Carga" />
                <x-input type="text" class="w-full" wire:model="coche.cap_carga"/>

                <x-input-error for="cap_carga" />
            </div> 
            
            <div class="mb-4">
                <x-label value="Modelo" />
                <x-input wire:model="coche.modelo" type="text" class="w-full" />           

                <x-input-error for="modelo" />
            </div>
            
        
            <div>
                <input type="file" wire:model="image" id="{{$identificador}}">
                <x-input-error for="image" />
            </div>
            
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                Actualizar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>    
</div>
