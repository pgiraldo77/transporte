<div>
    <x-danger-button wire:click="$set('open', true)">
        Crear Empresa
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear Empresa
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Razón Social" />
                <x-input type="text" class="w-full" wire:model="razon_social"/>

                <x-input-error for="razon_social" />    
            </div>    

            <div class="mb-4">
                <x-label value="Cuit" />
                <x-input type="text" class="w-full" wire:model="cuit"/>

                <x-input-error for="cuit" />
            </div> 
            
            @livewire('select-anidados')            
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

