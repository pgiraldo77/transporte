@php
use App\View\Components\alert;
$color = 'red';
$alert = 'alert2';
@endphp

<x-app-layout>
    <div class="container mx-auto">
        <x-alert :color="$color">
            Cualquier mensaje
        </x-alert>
    
        <x-alert2 :color="$color">
            <x-slot name="title">
                Tìtulo de prueba
            </x-slot>    
            Otro texto de prueba
        </x-alert2>  
        
        <x-dynamic-component :component="$alert">
            <x-slot name="title">
                Tìtulo de prueba
            </x-slot>    
            Otro texto de prueba
        </x-dynamic-component>    
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <ul>
                    <x-table>
                        
                        <table class="min -w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase">
                                        Detalle
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase">
                                        Cap. de Carga
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray->500 uppercase">
                                        Editar
                                    </th>
                                </tr>
                            </thead>
                            <tbody class=" bg-white divide+y divide-gray-200">
                                @foreach ($coches as $coche)
                                <tr>
                                    <td class="px-6 py-4">
                                        {{$coche->id}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{$coche->detalle}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{$coche->cap_carga}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{route('coches.edit',$coche)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>         
                                @endforeach
                        </table>
                    </x-table>
                </ul>

            </div>
        </div>
    </div>

</x-app-layout>
