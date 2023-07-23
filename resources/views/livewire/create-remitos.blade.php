<div>   
    <x-danger-button wire:click="$set('open', true)">
        Remito
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear Remito
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Número" />
                <x-input type="text" class="w-full" wire:model="nro"/>

                <x-input-error for="nro" />    
            </div>    

            <div class="mb-4">
                <x-label value="Fecha Remito" />
                <x-input type="date" class="w-full" wire:model="fecha"/>

                <x-input-error for="fecha" />
            </div> 
            <div class="mb-4">
                <x-label value="Fecha Sello" />
                <x-input type="date" class="w-full" wire:model="fecha_sello"/>

                <x-input-error for="fecha_sello" />
            </div> 

            <div class="mb-4">
                <x-label value="Observacion" />
                <x-input type="text" class="w-full" wire:model="observacion"/>

                <x-input-error for="observacion" />
            </div> 
            
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                Cargar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>    
</div>
