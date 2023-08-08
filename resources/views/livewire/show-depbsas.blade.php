<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
   
        <div class="font-medium text-center text-blue-700 uppercase decoration-slate-50"> Alta remitos deposito Bs. As. </div>   
   
        <div> <x-label class="text-right text-{{ $color }}-600 text-9xl" value="Met. Cubicos Totales--> {{ $suma }}" /></div>
 
    @livewire('create-depbsas')

    <x-table>
        @if ($remitos->count())
            <table class="min -w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            <label>
                                <input type="checkbox" wire:click="$set('checktodos', 'checked')">
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
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('nro')">
                            Remito

                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
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
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase"
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
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase"
                            wire:click="order('fecha_sello')">
                            Fecha Sello
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase">
                           
                        </th>
                    </tr>
                </thead>
                <tbody class=" bg-white divide+y divide-gray-200">
                    @foreach ($remitos as $remito)
                        <tr>
                            <td class="py-4 px-4">
                                <label>
                                    <input type="checkbox" wire:model="elementos"
                                        value="{{ $remito->id . '-' . $remito->m_cubicos }}">
                                    {{ $remito->m_cubicos }}
                                </label>

                            </td>
                            <td class="px-6 py-4">
                                {{ $remito->origen }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $remito->destino }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $remito->nro }}

                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $remito->bultos }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500">
                                ${{ $remito->valor_dec }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $remito->fecha_sello }}
                            </td>
                            <td class="cursor-pointer">
                               <div class="w-6 h-7"> 
                               <img src="assets/img/editar.jpg" alt="imagen" />
                             </div>
                            </td>
                            <td class="cursor-pointer">
                                <div class="w-6 h-7"> 
                                <img src="assets/img/delete.jpg" alt="imagen" />
                              </div>
                             </td>
                        </tr>
                    @endforeach
            </table>

        @endif

        <div class="flex items-center justify-center h-screen py-4">
            <form action="{{ route('fojas.create') }}" method="GET">
                <button class="hover:bg-sky-700 button bottom-3 rounded-lg px-4 py-2" wire:click="$emit('valorchecks',$suma)">Cargar</button>
            </form>
        </div>

    </x-table>

</div>
