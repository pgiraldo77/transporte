<div>   
    <x-danger-button wire:click="$set('open', true)">
        Remito
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Nuevo Remito
        </x-slot>
        <x-slot name="content">
            @livewire('select-empresas',['valor'=>0]) {{-- //con valor 0 indica que se carga la prov. de Bs. AS. --}}
            <br>
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
                <x-label value="Bultos" />
                <x-input type="text" class="w-full" wire:model="bultos"/>

                <x-input-error for="bultos" />
            </div> 
            <div class="mb-4">
                <x-label value="Valor Declarado" />
                <x-input type="text" class="w-full" wire:model="valor_dec"/>

                <x-input-error for="valor_dec" />
            </div>

            <div class="mb-4">
                <x-label value="Metros Cúbicos" />
                <x-input type="text" class="w-full" wire:model="m_cubicos"/>

                <x-input-error for="bultos" />
            </div> 

            <div class="mb-4">
                <x-label value="Kgr" />
                <x-input type="text" class="w-full" wire:model="kgr"/>

                <x-input-error for="kgr" />
            </div> 

            <div class="mb-4">
                <x-label value="Posición" />
                <select id="posicion" wire:model="posicion">
                    <option value="">Seleccione Posición</option>
                    <option value="1">1</option>
                    <option value="1/4">1/4</option>
                    <option value="1/2">1/2</option>
                    <option value="3/4">3/4</option>
                </select>
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