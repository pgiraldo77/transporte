<div>
    <div>
        <label for="empresa">Empresa :</label>
        <select id="empresa" wire:change="listarPersonas($event.target.value)">
            <option value="">Seleccione una Empresa</option>
            @foreach ($empresas as $emp)
                <option value="{{ $emp->id }}">{{ $emp->razon_social }}</option>
            @endforeach
        </select>

        <label for="persona">Persona :</label>
        <select id="persona" wire:change="selectPersonaid($event.target.value)">
            <option value="">Seleccione un Persona</option>
            @foreach ($personas as $per)
                <option value="{{ $per->id }}">{{ $per->apellido.", ".$per->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>