<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <div class="font-medium text-center uppercase decoration-blue-400"> Nueva Foja de Ruta Nº {{$nro_foja}}</div>

    <div> <x-label class="text-right text-{{ $color }}-600 text-9xl" value="Met. Cubicos Totales--> {{ $suma_tot }}" /></div>
    {{$this->mensaje}}       

    <x-table>
        @if (count($remitos) > 0 || $guias->count()>0)
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
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs text--500 uppercase"
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
                            class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray->500 uppercase">
                            <x-label value="Valor Dec" />

                            <x-input-error for="valor_dec" />

                        </th>

                        <th scope="col"
                            class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray->500 uppercase"
                            wire:click="order('fecha_sello')">
                            <x-label value="Fecha Sello" />
                        </th>

                        <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray->500 uppercase">
                               Volver a Depósito 
                        </th>
                    </tr>
                    <div>
                        <x-danger-button wire:click="modvaldec">
                            Estimar
                        </x-danger-button>
                    </div>

                </thead>

                <tbody class=" bg-white divide+y divide-gray-200">    
                  @if($guias->count()>0)                  
                        <?php $i=1; ?>
                        @foreach ($guias as $guia)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $guia->origen }}</td>
                            <td>
                                <div class="w-6 h-7">
                                    <img src="assets/img/flecha_azul.jpg" alt="imagen" />
                                </div>
                            </td>
                            <td>{{ $guia->destino }}</td>
                            <td>{{ $guia->nro }}</td>
                            <td>{{ $guia->bultos }}</td>
                            <td>{{ $guia->valor_dec }}</td>
                            <td>{{ $guia->fecha_sello }}</td>
                            <td class="cursor-pointer">
                                <div class="w-6 h-7">
                                    <img src="assets/img/flecha_roja.png" alt="Delete" wire:click="quitardeFoja({{ $guia->guia_id }})" />

                                </div>
                            </td>
                        </tr>
                        @endforeach
                @endif        
                @if (count($remitos) > 0)    
                    @foreach ($remitos as $index => $remito)
                    @if (isset($remito->origen))
                        <tr>
                            <td></td>
                            <td>{{ $remito->origen }}</td>
                            <td>
                                <div class="w-6 h-7">
                                    <img src="assets/img/flecha_roja_der.jpg" alt="imagen" />
                                </div>
                            </td>
                            <td>{{ $remito->destino }}</td>
                            <td>{{ $remito->nro }}</td>
                            <td>
                                <input type="text" value="{{ $remito->bultos }}" name="bultos">
                            </td>
                            <td>
                                <input type="text" value="{{ $remito->valor_dec }}" name="valor_dec">
                            </td>
                            <td>{{ $remito->fecha_sello }}</td>
                            <td class="cursor-pointer">
                                <div class="w-6 h-7">
                                    <img src="assets/img/flecha_roja.png" alt="Eliminar" wire:click="removeItem({{ $index }})" />
                                </div>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                  @endif  
                </tbody>
            </table>
            <div>
                <label value="completo">
                    <input type="checkbox" wire:model.defer="completo">
                    {{"Incompleto"}}
                </label>
            </div> 
            <div>
                <textarea wire:model.defer="observacion" rows="4" cols="50">{{$observacion}}</textarea>
            </div>   

            <div class="flex items-center justify-center h-screen py-4">
                <div>
                    <form action="{{ route('depbsas.show') }}" method="GET">
                        <button class="hover:bg-sky-700 rounded-lg px-4 py-2">Volver</button>
                    </form>
                </div>
                <div>
                    <button class="button bottom-3 rounded-lg px-4 py-2" wire:click="save">
                        Cargar
                    </button>
                </div>
            </div>
        @endif
    </x-table>
    
</div>
