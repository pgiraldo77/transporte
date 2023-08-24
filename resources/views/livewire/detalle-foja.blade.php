<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

    <x-table>
        <div class="font-medium text-center uppercase decoration-blue-400"> Detalle Foja de Ruta Nº {{ $nro_foja }}
        </div>
        <div>
            <label class="text-{{$color}}-600" value="completo">{{ $completo }}</label>
        </div>
        <div> <x-label class="text-right text-{{ $color }}-600 text-9xl"
                value="Met. Cubicos Totales--> {{ $suma_tot }}" /></div>
        @if ($remitos->count() > 0)
            <table class="min -w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="w-24 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            <x-label value="Nro" />

                        </th>
                        <th scope="col"
                            class="w-24 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('origen')">
                            <x-label value="Origen" />

                        </th>
                        <th scope="col"
                            class="w-24 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase">

                        </th>
                        <th scope="col"
                            class="w-24 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('destino')">
                            <x-label value="Destino" />

                        </th>
                        <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs text--500 uppercase"
                            wire:click="order('nro')">
                            <x-label value="Remito" />

                        </th>
                        <th scope="col"
                            class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('bultos')">
                            <x-label value="Bultos" />

                            <x-input-error for="bultos" />

                        </th>

                        <th scope="col"
                            class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                            wire:click="order('m_cub_tot')">
                            <x-label value="M. Cub. Tot." />

                            <x-input-error for="m_cub_tot" />

                        </th>

                        <th scope="col"
                            class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray->500 uppercase">
                            <x-label value="Valor Dec" />

                            <x-input-error for="valor_dec" />

                        </th>

                        <th scope="col"
                            class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray->500 uppercase"
                            wire:click="order('fecha_sello')">
                            <x-label value="Fecha Sello" />
                        </th>
                    </tr>
                </thead>

                <tbody class=" bg-white divide+y divide-gray-200">
                    @if ($remitos->count() > 0)
                        <?php $i = 1; ?>
                        @foreach ($remitos as $remito)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $remito->origen }}</td>
                                <td>
                                    <div class="w-6 h-7">
                                        <img src="../assets/img/flecha_azul.jpg" alt="imagen" />
                                    </div>
                                </td>
                                <td class="text-center">{{ $remito->destino }}</td>
                                <td class="text-center">{{ $remito->nro }}</td>
                                <td class="text-center">{{ $remito->bultos }}</td>
                                <td class="text-center">{{ $remito->m_cubicos }}</td>
                                <td class="text-center">{{ $remito->valor_dec }}</td>
                                <td class="text-center">{{ $remito->fecha_sello }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div>
                <textarea wire:model.defer="observacion" rows="4" cols="54">{{ $observacion }}</textarea>
            </div>
            <table>
                <tr>
                    <td>
                        <div class="">
                            <form action="{{ route('fojas.listar') }}" method="GET">
                                <button class="hover:bg-sky-700 rounded-lg px-4 py-2">Volver</button>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div>@livewire('asigna-coche')</div>
                    </td>
                </tr>
            </table>
        @endif
        
    </x-table>
</div>
