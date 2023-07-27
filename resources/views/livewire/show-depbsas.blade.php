<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
   @livewire('create-depbsas')

    <x-table>          
        @if ($remitos->count())
            <table class="min -w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('id')">
                           Check
                        </th>
                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('id')">
                            Origen

                           
                        </th>
                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('nro')">
                            Destino
                            
                            
                            
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('fecha_sal')">
                            Remito

                            
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('fecha_sal')">
                            Bultos
  
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('fecha_sal')">
                            Valor Declarado
  
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase">
                            Fecha Sello
                        </th>

                        <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase">
                        Editar
                        </th>
                    </tr>
                </thead>
                <tbody class=" bg-white divide+y divide-gray-200">
                    @foreach ($remitos as $remito)
                    <tr>
                        <td class="px-6 py-4">
                            <x-checkbox>

                            </x-checkbox>
                        </td>
                        <td class="px-6 py-4">
                            {{$remito->origen}}
                        </td>
                        <td class="px-6 py-4">
                            {{$remito->destino}}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{$remito->nro}}
                            
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{$remito->bultos}}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-500">
                            ${{$remito->valor_dec}}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{$remito->fecha_sello}}
                        </td>
                        <td class="cursor-pointer px-6 py-4 whitespace-nowrap text-sm font-medium">
                            Editar
                            {{--@livewire('edit-foja',['fojas'=>$fojas],key($fojas->id))--}}
                        </td>
                    </tr>         
                    @endforeach
            </table>
                    
            @endif

    </x-table>
</div>
