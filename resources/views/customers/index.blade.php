@extends('layouts.dashboardLayouts.menu')

@section('title', 'Customers')

@section('content')
    <x-button>
        <x-slot name="type">customer</x-slot>

        <x-slot name="add">Agregar cliente</x-slot>

        <x-slot name="list">Listar clientes</x-slot>

    </x-button>
    <!-- Table with colgroup -->
    <table class="container-table-providers table table-striped table-hover">

        @if (count($data) > 0)
            <tr class="providers-table-title table-dark">
                <th>Tipo de documento</th>
                <th>Documento</th>
                <th>Nombre completo</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Departamento</th>
                <th>Ciudad</th>
                <th>Dirección</th>
                <th>Fecha creación</th>
                <th>Fecha Edición</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>

            @forelse ($data as $key => $item)
                <tr class="providers-separate">
                    <td class="providers-index-center">{{ $item->document_type_id }}</td>
                    <td class="providers-index-center">{{ $item->document_number }}</td>
                    <td class="providers-index-center">{{ $item->name . ' ' . $item->lastname }}</td>
                    <td class="providers-index-center">{{ $item->cellphone }}</td>
                    <td class="providers-index-center">{{ $item->email }}</td>
                    <td class="providers-index-center">{{ $item->department_id }}</td>
                    <td class="providers-index-center">{{ $item->city }}</td>
                    <td class="providers-index-center">{{ $item->street }}</td>
                    <td class="providers-index-center">{{ $item->created_at }}</td>
                    <td class="providers-index-center">{{ $item->updated_at }}</td>
                    <td style="text-align: center">
                        <a href="#">
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
        @else
            <h1 class="bg-warning d-flex justify-content-center">No hay clientes para mostrar</h1>
        @endif

    </table>

@endsection
