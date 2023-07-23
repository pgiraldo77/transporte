<div>
    <div>
        <label for="provincia">Provincia :</label>
        <select wire:change="listarEmpresas($event.target.value)" id="provincia">
            <option value="">Seleccione una provincia</option>
            @foreach ($provincias as $provincia)
                <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
            @endforeach
        </select>
    </div>
    </br>
    <div>
        <label for="empresa">Empresa :</label>
        <select id="empresa">
            <option value="">Seleccione una Empresa</option>
            @foreach ($empresas as $empresa)
                <option value="{{ $empresa->emp_loc_id }}">{{ $empresa->razon_social }}</option>
            @endforeach
        </select>
    </div>
</div>
