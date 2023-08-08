<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

    <x-table>
       @if(count($remitos)>0)
            <table class="min -w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('origen')">
                            <x-label value="Origen" />


                        </th>
                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('destino')">
                            <x-label value="Destino" />

                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('nro')">
                            <x-label value="Remito" />

                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('bultos')">
                            <x-label value="Bultos" />

                            <x-input-error for="bultos" />
                           
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase"
                            <x-label value="Valor_Dec" />

                            <x-input-error for="valor_dec" />
                        
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase"
                            wire:click="order('fecha_sello')">
                            <x-label value="Fecha Sello" />
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase">
                            Editar
                        </th>
                    </tr>
                   <div>
                     <x-danger-button wire:click="modvaldec">
                      Estimar
                     </x-danger-button>
                   </div>  
                   
                </thead>
                           
                <tbody class=" bg-white divide+y divide-gray-200">
                    @foreach ($remitos as $index => $remito)
                    <tr>
                        <td>{{ $remito->origen }}</td>
                        <td>{{ $remito->destino }}</td>
                        <td>{{ $remito->nro }}</td>
                        <td>
                           <input type="text" value="{{$remito->bultos}}">
                        </td>
                        <td>
                            <input type="text" value="{{ $remito->valor_dec }}">
                        </td>
                        <td>{{ $remito->fecha_sello }}</td>
                        <td>Editar</td>
                    </tr>
                    
                @endforeach
                                              
            </table>

           @endif 
           
    </x-table>
   
</div>
