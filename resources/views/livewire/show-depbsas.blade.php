<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

    <div class="font-medium text-center uppercase decoration-blue-400"> Alta remitos deposito Bs. As. </div>

    <div class="flex justify-end">
        <table class="mr-0 border-collapse border-0">
            <thead>
            <tr>
                <td class="flex justify-end">M. Cubicos</td> 
                <td><x-label class="text-center text-{{ $color }}-600 text-9xl" value="{{ $suma }}" /></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="flex justify-end">Posción</td>    
                <td><x-label class="text-center text-{{ $color }}-600 text-9xl" value="{{ $suma_posi }}" /></td>
            </tr>
            </tbody>
        </table>
    </div>

    @livewire('create-depbsas')

    <x-table>
        @if ($remitos->count())
            <table class="min -w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            <label>
                                <input type="checkbox" wire:model="checktodos" wire:click="toggleSelectAll">
                                Todos
                            </label>

                        </th>
                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('origen')">
                            Origen


                        </th>

                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('destino')">
                            Destino

                        </th>
                        <th scope="col"
                            class="cursor-pointer px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('nro')">
                            Remito

                        </th>
                        <th scope="col"
                            class="cursor-pointer px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('bultos')">
                            Bultos
                            {{-- sort --}}
                            @if ($sort == 'bultos')

                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"> </i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"> </i>
                                @endif
                            @endif
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('posicion')">
                            Posición
                            {{-- sort --}}
                            @if ($sort == 'posicion')

                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"> </i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"> </i>
                                @endif
                            @endif
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('m_cubicos')">
                            Mtrs. Cúbicos
                            {{-- sort --}}
                            @if ($sort == 'm_cubicos')

                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"> </i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"> </i>
                                @endif
                            @endif
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-3 py-3 text-left text-xs font-medium text-gray->500 uppercase"
                            wire:click="order('valor_dec')">
                            Valor Declarado

                            {{-- sort --}}
                            @if ($sort == 'valor_dec')

                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"> </i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"> </i>
                                @endif
                            @endif
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-3 py-3 text-left text-xs font-medium text-gray->500 uppercase"
                            wire:click="order('fecha_sello')">
                            Fecha Sello
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-3 py-3 text-left text-xs font-medium text-gray->500 uppercase"
                            wire:click="order('observacion')">
                            Observacion
                        </th>

                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray->500 uppercase">

                        </th>
                    </tr>
                </thead>
                <tbody class=" bg-white divide+y divide-gray-200">
                    @foreach ($remitos as $remito)
                        <tr>
                            <td class="px-6 py-4">
                                <label>
                                    <input type="checkbox" wire:model="elementos" 
                                        value="{{ $remito->id . '-' . $remito->m_cubicos . '-' . $remito->posicion }}"
                                        <?php if ($checktodos == 1) echo "checked"; ?> >
                                </label>
                            </td>
                            <td class="px-4 py-4">
                                {{ $remito->origen }}
                            </td>

                            <td class="px-4 py-4">
                                {{ $remito->destino }}
                            </td>
                            <td class="px-4 py-4 text-center text-sm text-gray-500">
                                {{ $remito->nro }}

                            </td>
                            <td class="px-3 py-4 text-center text-sm text-gray-500">
                                {{ $remito->bultos }}
                            </td>

                            <td class="px-3 py-4 text-center text-sm text-gray-500">
                                {{ $remito->posicion }}
                            </td>

                            <td class="px-3 py-4 text-center text-sm text-gray-500">
                                {{ $remito->m_cubicos }}
                            </td>

                            <td class="px-3 py-4 text-center text-sm text-gray-500">
                                ${{ $remito->valor_dec }}
                            </td>
                            <td class="px-3 py-4 text-center text-sm text-gray-500">
                                {{ $remito->fecha_sello }}
                            </td>
                            <td class="px-3 py-4 text-center text-sm text-gray-500">
                                {{ $remito->observacion }}
                            </td>
                            <td class="cursor-pointer">
                                <div class="w-5 h-5">
                                    <img src="assets/img/editar.jpg" alt="imagen" />
                                </div>
                            </td>
                            <td class="cursor-pointer">
                                <div class="w-4 h-4">
                                    <img src="assets/img/delete.jpg" alt="imagen" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
            </table>

        @endif

        <div class="flex items-center justify-center h-screen py-4">
            <form action="{{ route('fojas.create') }}" method="GET">
                <button class=" button bottom-3 rounded-lg bg-blue-500"
                    wire:click="$emit('valorchecks',$suma)">Cargar</button>
            </form>
        </div>

    </x-table>

</div>
