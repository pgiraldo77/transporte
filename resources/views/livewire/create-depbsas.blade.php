<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="font-medium text-center text-gray-600 uppercase">-- Alta remitos deposito Bs. As. --</div>    
     
<br>
    <x-table>          
            <table class="min -w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray->500 uppercase">
                            Origen
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray->500 uppercase">
                            Destino                                        
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray->500 uppercase">
                            Remito
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray->500 uppercase">
                          
                        </th>
                    </tr>
                </thead>
                <tbody class=" bg-white divide+y divide-gray-200">
                    
                    <tr>
                        <td class="px-6 py-4">                           
                            @livewire('select-empresas')
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            @livewire('select-empresas')
                        </td>
                        <td class="cursor-pointer px-6 py-4 text-sm text-gray-500">
                            @livewire('create-remitos')
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                                Cargar
                            </x-danger-button>     
                        </td>
                    </tr>                           
            </table>
    </x-table>
</div>