<div>
    <div>
        <label for="provincia">Provincia :</label>
        <select wire:change="listarLocalidades($event.target.value)" id="provincia">
            <option value="">Seleccione una provincia</option>
            @foreach ($provincias as $provincia)
                <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
            @endforeach
        </select>
    </div>
    </br>
    <div>
        <label for="localidad">Localidad :</label>
        <select id="localidad">
            <option value="">Seleccione una localidad</option>
            @foreach ($localidades as $localidad)
                <option value="{{ $localidad->id }}">{{ $localidad->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>
