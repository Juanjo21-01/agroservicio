<x-layouts.plantilla titulo="Clientes" meta-description="Clientes meta description">
    {{-- CONTENIDO DEL MODULO CLIENTES --}}

    <div class="container-fluid">

        <h1 class="text-center mt-2">Clientes</h1>

        <div class="row">
            <div class="col-12">

                <!-- Botones para tabla tipo clientes, crear y ver deshabilitados-->
                <div class="card shadow border-secondary">
                    <div class="card-header border-bottom shadow">
                        <div class="row justify-content-between py-1">
                            <div class="col-3 text-center">
                                <a href="{{ route('tpcl.index') }}" class="btn btn-outline-secondary bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Ver los Registros de los Tipo de Clientes"><span
                                        class="d-none d-lg-inline-block">Ir a Tabla Tipo de Clientes</span> <i
                                        class="bi bi-arrow-up-right"></i> </a>
                            </div>
                            <div class="col-3 text-center">
                                <a href="{{ route('cl.create') }}" class="btn btn-success bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Crear Nuevo Registro"> <i class="bi bi-plus-circle"></i>
                                    <span class="d-none d-sm-inline-block">{{ __('Crear Nuevo') }}</span> </a>
                            </div>
                            <div class="col-3 text-center">
                                <a href="{{ route('cl.archive') }}" class="btn btn-danger bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Ver Registros Deshabilitados"> <i class="bi bi-file-earmark-x"></i>
                                    <span class="d-none d-sm-inline-block">{{ __('Deshabilitados') }} </span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mensaje de Alerta ---->
                @if ($message = Session::get('success'))
                    <div class="card shadow border-secondary alert alert-success alert-dismissible fade show"
                        role="alert">
                        <span class="text-center">{{ $message }} </span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Cerrar Mensaje"></button>
                    </div>
                @endif

                <!-- Tabla ---->
                <div class="card shadow border-secondary">
                    <div class="card-body shadow">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="ordenamiento">
                                <thead class="thead">
                                    <tr>
                                        <th class="col-1 text-center shadow align-middle">ID</th>
                                        <th class="col-3 text-center shadow align-middle">Nombre</th>
                                        <th class="col-1 text-center shadow align-middle">Telefono</th>
                                        <th class="col-2 text-center shadow align-middle">Dirección</th>
                                        <th class="col-1 text-center shadow align-middle">Tipo de Cliente</th>
                                        <th class="col-2 text-center shadow align-middle">Fecha</th>
                                        <th class="col-2 text-center shadow align-middle">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td class="col-1 text-center align-middle">{{ $cliente->id }}</td>
                                            <td class="col-3 text-justify align-middle">
                                                {{ Str::title($cliente->nombre) }}
                                            </td>
                                            <td class="col-1 text-justify align-middle">{{ $cliente->telefono }}
                                            </td>
                                            <td class="col-2 text-justify align-middle">
                                                {{ Str::title($cliente->direccion) }}
                                            </td>
                                            <td class="col-1 text-justify align-middle">
                                                @foreach ($tipoClientes as $tipoCliente)
                                                    @if ($cliente->tipo_cliente_id == $tipoCliente->id)
                                                        {{ Str::title($tipoCliente->nombre) }}
                                                    @else
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="col-2 text-justify align-middle">
                                                {{ $cliente->created_at->diffForHumans() }}
                                            <td class="col-2 text-center">
                                                <a class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Ver"
                                                    href="{{ route('cl.show', $cliente->id) }}"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a class="btn btn-sm btn-outline-success mb-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Editar"
                                                    href="{{ route('cl.edit', $cliente->id) }}"><i
                                                        class="bi bi-pencil-square"></i></a>

                                                @if (Auth::user()->tipo_usuarios_id == 1 || Auth::user()->tipo_usuarios_id == 2)
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-outline-danger mb-1"
                                                        title="Deshabilitar" data-bs-toggle="modal"
                                                        data-bs-target="#modal-deshabilitar-{{ $cliente->id }}"><i
                                                            class="bi bi-archive-fill"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @include('cliente.deshabilitar')
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
