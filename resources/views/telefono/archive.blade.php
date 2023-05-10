<x-layouts.plantilla titulo="Telefonos Deshabilitados" meta-description="Telefonos deshabilitados meta description">
    {{-- CONTENIDO DEL MODULO Telefonos --}}

    <div class="container-fluid">

        <h1 class="text-center mt-2"> Teléfonos de Proveedores Deshabilitados</h1>

        <div class="row">
            <div class="col-12">

                <!-- Botones para tabla proveedores, crear y ver deshabilitados-->
                <div class="card shadow border-secondary">
                    <div class="card-header border-bottom shadow">
                        <div class="row justify-content-between py-1">
                            <div class="col-12 text-center">
                                <a href="{{ route('tel.index') }}" class="btn btn-outline-success bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Ver los Registros de los Teléfonos"><span
                                        class="d-none d-lg-inline-block">Regresar a Tabla de Teléfonos</span>
                                    <i class="bi bi-arrow-up-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabla ---->
                <div class="card shadow border-secondary">
                    <div class="card-body shadow">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="ordenamiento">
                                <thead class="thead">
                                    <tr>
                                        <th class="col-1 text-center shadow">ID</th>
                                        <th class="col-4 text-center shadow">Proveedor</th>
                                        <th class="col-3 text-center shadow">Telefono</th>
                                        <th class="col-2 text-center shadow">Fecha</th>
                                        <th class="col-2 text-center shadow">Restaurar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($telefonos as $telefono)
                                        <tr>
                                            <td class="col-1 text-center align-middle">{{ $telefono->id }}</td>
                                            <td class="col-4 text-justify align-middle">
                                                @foreach ($proveedores as $proveedore)
                                                    @if ($proveedore->id == $telefono->proveedor_id)
                                                        {{ Str::title($proveedore->nombre) }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="col-3 text-center align-middle">{{ $telefono->telefono }} </td>
                                            <td class="col-2 text-justify align-middle">
                                                {{ $telefono->created_at->diffForHumans() }}
                                            </td>
                                            <td class="col-2 text-center">
                                                @if (Auth::user()->tipo_usuarios_id == 1 || Auth::user()->tipo_usuarios_id == 2)
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-outline-success mb-1"
                                                        title="Restaurar" data-bs-toggle="modal"
                                                        data-bs-target="#modal-restaurar-{{ $telefono->id }}"><i
                                                            class="bi bi-file-arrow-up"></i> Restaurar
                                                    </button>
                                                @endif
                                        </tr>
                                        @include('telefono.restaurar')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.plantilla>
