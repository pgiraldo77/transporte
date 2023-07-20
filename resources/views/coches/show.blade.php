<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Coches Show {{ $coche->detalle }}</h1>
                <p><strong>Cap. de Carga: {{ $coche->cap_carga }}</strong></p>
                <p><strong>Modelo: {{ $coche->modelo }}</strong></p>
                <p>
                    <a href="{{ route('coches.index') }}">Volver</a>
                    <br>
                    <a href="{{ route('coches.edit', $coche) }}">Editar Coche</a>
                </p>

                <form action="{{ route('coches.destroy', $coche) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>