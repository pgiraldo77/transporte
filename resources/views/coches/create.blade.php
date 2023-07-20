<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Coches Create</h3>
            <br>
            <form action="{{route('coches.store')}}" method="POST">
                @csrf

                <label>Coche:</label> 
                <input type="text" name="detalle" value="{{old('detalle')}}">
                <br/>
                <br/>
                @error('detalle')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
                <label> Cap. Carga:</label>
                <input type="text" name="cap_carga" value="{{old('cap_carga')}}">
                <br/>
                <br>
                @error('cap_carga')
                <br>
                <small>*{{$message}}</small>
                <br>
                @enderror
                <label>Modelo:</label> 
                <input type="text" name="modelo" value="{{old('modelo')}}">
                <br/> 
                <br>
                @error('modelo')
                <br>
                <small>*{{$message}}</small>
                <br>
                @enderror
            <button type="submit">Enviar</button>    
            </form>   
            
        </div>    
    </div>
</div>
</x-app-layout>