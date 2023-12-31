<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
   
    <x-table>
        <div class="px-6 py-4 flex items-center">
            <input type="text" wire:model="search" class="flex-1 mr-4" placeholder="Escriba que está buscando">
        </div>    
        
        @if ($fojas->count())

            <table class="min -w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('id')">
                            ID

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
                            N° Foja Ruta
                            
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
                            Fecha Salida

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
                            wire:click="order('m_cub_tot')">
                            M. Cubicos

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
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('completo')">
                            Carga Completa

                            {{--sort--}}
                            @if ($sort == 'completo')
                                
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
                            Estado
                        </th>
                        <th scope="col"
                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase">
                        Valor

                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('observacion')">
                            Observación

                            {{--sort--}}
                            @if ($sort == 'observacion')
                                
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
                            Ver
                        </th>
                    </tr>
                </thead>
                <tbody class=" bg-white divide+y divide-gray-200">
                    @foreach ($fojas as $foja)
                    <?php if($foja->estado_id == 0) $estado="Activa";
                          else $estado="Finalizada";  
                          if($foja->completo == 0){ $completo="Completo"; $color="gray"; }
                          else{ $completo="INCOMPLETO"; $color="red";}                           
                          ?>
                    <tr>
                        <td class="px-6 py-4">
                            {{$foja->id}}
                        </td>
                        <td class="px-6 py-4 text-sm text-{{$color}}-600">
                            {{$foja->nro}}
                        </td>
                        <td class="px-6 py-4 text-sm text-{{$color}}-600">
                            {{$foja->fecha_sal}}
                        </td>
                        <td class="px-6 py-4 text-sm text-{{$color}}-600">
                            {{$foja->m_cub_tot}}
                        </td>
                        <td class="px-6 py-4 text-sm text-{{$color}}-600">
                            {{$completo}}
                        </td>
                        <td class="px-6 py-4 text-sm text-{{$color}}-600">
                            {{$estado}}
                        </td>
                        <td class="px-6 py-4 text-sm text-{{$color}}-600">
                            ${{round(($foja->m_cub_tot/$posicion)*$posi_precio,2)}}
                        </td>
                        <td class="px-6 py-4 text-sm text-{{$color}}-600">
                            {{$foja->observacion}}
                        </td>
                        <td class="cursor-pointer px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="w-6 h-7">
                                <img src="assets/img/lupa.jpg" alt="imagen" wire:click="verFoja({{ $foja->id }})"/>
                            </div>  
                        </td>
                    </tr>         
                    @endforeach
            </table>
                
            @else
                <div class="px-6 py-4">
                    No existe ningún registro coincidente
                </div>    
            @endif

    </x-table>
</div>
