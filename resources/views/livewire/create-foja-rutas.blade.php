<div>   
    <x-danger-button wire:click="$set('open', true)">
        Crear Nueva Foja de Ruta
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Foja Nueva
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-label value="Nro Foja" />
              
            </div>    

            <div class="mb-4">
                <x-label value="Coche" />
                <x-input type="text" class="w-full" wire:model="coche"/>

                <x-input-error for="coche" />
            </div> 
            
            <div class="mb-4">
                <x-label value="Modelo" />
                <x-input wire:model="modelo" type="text" class="w-full" />           

                <x-input-error for="modelo" />
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
