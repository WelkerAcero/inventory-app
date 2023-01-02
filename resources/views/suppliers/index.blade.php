@extends('layouts.dashboardLayouts.menu')

@section('title', 'Providers')

@section('content')

    <div class="btn-rs">
        <x-button>
            <x-slot name="type">supplier</x-slot>
            <x-slot name="add">Agregar Proveedor</x-slot>
            <x-slot name="list">Listar Proveedores</x-slot>
        </x-button>

        <!-- Table with colgroup -->
        <div class="table-responsive-md">
            <table class="container-table table table-striped table-hover">

                @if (count($data) > 0)
                    <thead class="providers-table-title table-dark">
                        {{-- <th>key</th> --}}
                        <th>Código proveedor</th>
                        <th>Tipo Documento</th>
                        <th>Nro documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Departamento_id</th>
                        <th>Ciudad</th>
                        <th>Calle</th>
                        <th>Fecha creación</th>
                        <th>Fecha edición</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>

                    @forelse ($data as $item)
                        <tr class="providers-separate">
                            {{-- <td class="providers-index-center">{{ $key }}</td> --}}
                            <td class="providers-index-center">{{ $item->sup_code }}</td>
                            <td class="providers-index-center">{{ $item->document_type_id }}</td>
                            <td class="providers-index-center">{{ $item->document_number }}</td>
                            <td class="providers-index-center">{{ $item->sup_name }}</td>
                            <td class="providers-index-center">{{ $item->sup_lastname }}</td>
                            <td class="providers-index-center">{{ $item->sup_cellphone }}</td>
                            <td class="providers-index-center">{{ $item->sup_email }}</td>
                            <td class="providers-index-center">{{ $item->department_id }}</td>
                            <td class="providers-index-center">{{ $item->sup_city }}</td>
                            <td class="providers-index-center">{{ $item->sup_street }}</td>
                            <td class="providers-index-center">{{ $item->created_at }}</td>
                            <td class="providers-index-center">{{ $item->updated_at }}</td>

                            <td style="text-align: center">
                                <a href="{{ route('supplier.edit', [$item->id, $item->department_id]) }}">
                                    <abbr title="Editar información" style="cursor: pointer">
                                        <img src="{{ asset('img/icons/editar.png') }}" width="40px">
                                    </abbr>
                                </a>
                            </td>
                            <td style="text-align: center">
                                <form method="post" action="{{ route('supplier.destroy', $item->id) }}">
                                    @csrf
                                    @method('delete')
                                    <a type="button" id="btn-AlertDelete">
                                        <abbr title="Eliminar información" style="cursor: pointer;">
                                            <img src="{{ asset('img/icons/borrar.png') }}" width="40px">
                                        </abbr>
                                    </a>
                                </form>
                            </td>
                        </tr>

                    @empty
                    @endforelse ($data as $item)
                    {{ $data->links() }}
                @else
                    <h1 class="bg-warning d-flex justify-content-center">No hay proveedores para mostrar</h1>
                @endif
            </table>
        </div>
    </div>
@endsection
