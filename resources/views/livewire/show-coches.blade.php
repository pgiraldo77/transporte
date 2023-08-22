<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <x-table>
        <div class="px-6 py-4 flex items-center">
            <input type="text" wire:model="search" class="flex-1 mr-4" placeholder="Escriba que está buscando">

            @livewire('create-coche')
        </div>
        @if ($coches->count())

            <table class="min -w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase"
                            wire:click="order('nro')">
                            Patente

                            {{-- sort --}}
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
                            wire:click="order('detalle')">
                            Marca

                            {{-- sort --}}
                            @if ($sort == 'detalle')

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
                            wire:click="order('tipo_coche_id')">
                            Tipo Coche

                            {{-- sort --}}
                            @if ($sort == 'tipo_coche_id')

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
                            Cap. de Carga

                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase">

                        </th>
                    </tr>
                </thead>
                {{$cap_carga}}
                <tbody class=" bg-white divide+y divide-gray-200">
                    @foreach ($coches as $coche)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $coche->nro }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $coche->detalle }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $coche->tipo }}
                            </td>
                            <td class="cursor-pointer px-6 py-4 text-sm text-gray-500">
                                @foreach ($coche->capcargas as $cap)
                                    <li wire:click="removeCap({{ $cap->id }},{{ $coche->id }})">{{ "(".$cap->nombre.")- ".$cap->m_cubicos }}</li>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                @livewire('edit-coche', ['coche' => $coche], key($coche->id))
                            </td>
                        </tr>
                    @endforeach

               @livewire('asoc-cap-carga')     
            </table>
        @else
            <div class="px-6 py-4">
                No existe ningún registro coincidente
            </div>
        @endif

    </x-table>
</div>
