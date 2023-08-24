<div>   
    <x-danger-button wire:click="$set('open', true)">
        Asignar Coche
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Asigna Coche a Foja Nº {{-- $foja --}}
        </x-slot>

        <x-slot name="content">     
            <div class="mb-4 text-base text-orange-800">                          
                ORIGEN
                @livewire('select-empresas',['valor'=>0])
              
            </div>
            <br>
            <div class="mb-4 text-base text-orange-800">
                DESTINO
                @livewire('select-empresas',['valor'=>1])
            </div>       
            <div class="mb-4">
                    <label>Coche :</label>
                <select id="coche" wire:change="selec_coche($event.target.value)">
                        <option value="">Seleccione Coche</option>
                        
                            @foreach ($coches as $c)
                            <option value="{{ $c->id }}">{{"(".$c->detalle.") ".$c->nro}}</option>
                            @endforeach
              </div>          
            </select>       

            <div class="mb-4">
                @livewire('select-persona',['funcion'=>2]) {{-- función con valor 2 indica que son Conductores --}}
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
