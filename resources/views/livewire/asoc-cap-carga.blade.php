<div>   
    <x-danger-button wire:click="$set('open', true)">
        Asociar Cap. Carga
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Asociar Cap Carga
        </x-slot>

        <x-slot name="content">            
            <div class="mb-4">
                    <label for="coche">Tipo :</label>
                    <select id="coche" wire:change="selec_coche($event.target.value)">
                        <option value="">Seleccione Coche</option>
                        
                            @foreach ($coches as $c)
                            <option value="{{ $c->id }}">{{"(".$c->detalle.") ".$c->nro}}</option>
                            @endforeach
                        
                    </select>
            </div> 

            <div class="mb-4">
                <label for="capacidad">Cap. Coche :</label>
                <select id="capacidad" wire:change="selec_cap($event.target.value)">
                    <option value="">Seleccione Cap</option>
                    
                        @foreach ($capacidad as $cap)
                        <option value="{{ $cap->id }}">{{"(".$cap->nombre.") ".$cap->m_cubicos}}</option>
                        @endforeach
                    
                </select>
        </div>   
        </x-slot>         
           
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Asociar
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>
</div>