<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
   
    <x-table>
        <div class="px-6 py-4 flex items-center">
            <input type="text" wire:model="search" class="flex-1 mr-4" placeholder="Escriba que está buscando">

            @livewire('create-cap-carga')            
        </div>    
        
        @if ($capacidad->count())

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
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase" 
                            wire:click="order('nombre')">
                            Nombre
                            
                            {{--sort--}}
                            @if ($sort == 'nombre')
                                
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
                            wire:click="order('m_cubicos')">
                            M. Cubicos

                            {{--sort--}}
                            @if ($sort == 'm_cubicos')
                                
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
                    @foreach ($capacidad as $cap)
                    <tr>
                        <td class="px-6 py-4">
                            {{$cap->id}}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{$cap->nombre}}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{$cap->m_cubicos}}
                        </td>
                       
                        <td class="cursor-pointer px-6 py-4 whitespace-nowrap text-sm font-medium">
                            Editar
                            {{--@livewire('edit-foja',['fojas'=>$fojas],key($fojas->id))--}}
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