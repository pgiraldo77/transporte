<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
   
    <x-table>
               
        @if ($remitos->count())

            <table class="min -w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('id')">
                            Origen

                            {{--sort--}}
                            @if ($sort == 'id')
                                
                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"> </i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"> </i>
                                @endif    
                                
                            @else
                                <i class="fas fa-sort float-right mt-1"> </i>
                            @endif
                        </th>
                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('nro')">
                            Destino
                            
                            {{--sort--}}
                            @if ($sort == 'nro')
                                
                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"> </i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"> </i>
                                @endif    

                                
                            @else
                                <i class="fas fa-sort float-right mt-1"> </i>
                            @endif
                            
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('fecha_sal')">
                            Remito

                            {{--sort--}}
                            @if ($sort == 'fecha_sal')
                                
                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"> </i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"> </i>
                                @endif    

                                
                            @else
                                <i class="fas fa-sort float-right mt-1"> </i>
                            @endif
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('fecha_sal')">
                            Bultos

                            {{--sort--}}
                            @if ($sort == 'm_cub_tot')
                                
                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"> </i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"> </i>
                                @endif    

                                
                            @else
                                <i class="fas fa-sort float-right mt-1"> </i>
                            @endif
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
                            {{$remito->id}}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{$remito->nro}}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{$remito->fecha_sal}}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{$remito->m_cub_tot}}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{$remito->completo}}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{$remito->observacion}}
                        </td>
                        <td class="cursor-pointer px-6 py-4 whitespace-nowrap text-sm font-medium">
                            Crear
                            {{--@livewire('edit-foja',['fojas'=>$fojas],key($fojas->id))--}}
                        </td>
                    </tr>         
                    @endforeach
            </table>
                    
            @endif

    </x-table>
</div>
