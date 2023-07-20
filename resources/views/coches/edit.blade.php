<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Editar Coche</h3>
            <br>
            <form action="{{route('coches.update',$coche->id)}}" method="POST">
                @csrf

                @method('put')

                <label>Coche:</label> 
                <input type="text" name="detalle" value="{{old('detalle',$coche->detalle)}}">
                @error('detalle')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
                <br/>
                <br/>
                <label> Cap. Carga:</label>
                <input type="text" name="cap_carga" value="{{old('cap_carga', $coche->cap_carga)}}">
                @error('cap_carga')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
                <br/>
                <br>
                <label>Modelo:</label> 
                <input type="text" name="modelo" value="{{old('modelo', $coche->modelo)}}">
                @error('modelo')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
                <br/> 
                <br>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @livewire('select-anidados')
                    </div>
                </div>

            <button type="submit">Modificar</button>    
            </form>   
            
        </div>    
    </div>
</div>
</x-app-layout> 