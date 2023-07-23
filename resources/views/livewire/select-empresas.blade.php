<div>
    <div>
        <label for="provincia">Provincia :</label>
        <select wire:change="listarEmpresas($event.target.value)" id="provincia">
            <option value="">Seleccione una provincia</option>
            @foreach ($provincias as $provincia)
                  @if($origen == $provincia->id) 
                        <option selected="{{ $provincia->id }}"  value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                  @else 
                        <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                  @endif
            @endforeach
        </select>
    </div>
    </br>
    <div>
        <label for="empresa">Empresa :</label>
        <select id="empresa" wire:change="selectEmpresaid($event.target.value)">
            <option value="">Seleccione una Empresa</option>
            @foreach ($empresas as $emp)
                <option value="{{ $emp->emp_loc_id }}">{{ $emp->razon_social }}</option>
            @endforeach
        </select>
    </div>
</div>
