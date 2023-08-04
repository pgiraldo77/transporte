<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <div>
        {{ var_dump($elementos) }}
        <br>
        

    </div>
    <x-table>
       @if($remitos)
            <table class="min -w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
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
                            <x-label value="bultos" />

                            <x-input-error for="bultos" />
                           
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase"
                            wire:click="order('valor_dec')">
                            Valor Declarado

                            <x-label value="valor_dec" />

                            <x-input-error for="valor_dec" />
                        
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase"
                            wire:click="order('fecha_sello')">
                            Fecha Sello
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase">
                            Editar
                        </th>
                    </tr>
                </thead>
                           
                <tbody class=" bg-white divide+y divide-gray-200">
                   
                       @foreach ($remitos as $remito)
                        <tr>

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
                                <input type="text" value="{{ $remito->bultos }}" name="bultos"/>                        
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500">
                                <input type="text" value="${{ $remito->valor_dec }}" name="bultos"/>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $remito->fecha_sello }}
                            </td>
                            <td class="cursor-pointer px-6 py-4 whitespace-nowrap text-sm font-medium">
                                Editar
                                
                            </td>
                        </tr>
                    @endforeach
                                                     
            </table>

           @endif 
    </x-table>
   
</div>
