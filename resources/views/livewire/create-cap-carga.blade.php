<div>   
    <x-danger-button wire:click="$set('open', true)">
        Nueva Cap. Carga
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Nueva Cap. Carga
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre" />
                <x-input type="text" class="w-full" wire:model="nombre"/>

                <x-input-error for="nombre" />    
            </div>    
            
            <div class="mb-4">
                <x-label value="M. Cubicos" />
                <x-input type="text" class="w-full" wire:model="m_cubicos"/>

                <x-input-error for="m_cubicos" />    
            </div>  
           
        </x-slot>         
           
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Nueva Cap.Carga
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>
</div>
