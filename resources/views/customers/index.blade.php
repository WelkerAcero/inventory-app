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

        {{-- @if (!empty($data)) --}}
            <tr class="providers-table-title table-dark">
                {{-- <th>key</th> --}}
                <th>Tipo de documento</th>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Fecha creación</th>
                <th>Fecha Edición</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>

            {{-- @forelse ($data as $key => $item)
                @if ($item != null) --}}
                    <tr class="providers-separate">
                        {{-- <td class="providers-index-center">{{ $key }}</td> --}}
                        <td class="providers-index-center">Lorem</td>
                        <td class="providers-index-center">Lorem</td>
                        <td class="providers-index-center">Lorem</td>
                        <td class="providers-index-center">Lorem</td>
                        <td class="providers-index-center">Lorem</td>
                        <td class="providers-index-center">Lorem</td>
                        <td class="providers-index-center">Lorem</td>
                        <td class="providers-index-center"> Lorem
                            {{-- @if (isset($item['dateEdited']))
                                {{ $item['dateEdited'] }}
                            @else
                                <?= $item['date'] ?>
                            @endif --}}
                        </td>

                        <td style="text-align: center">

                            <a >
                                <abbr title="Editar información" style="cursor: pointer">
                                    <img src="{{ asset('img/icons/editar.png') }}" width="25px">
                                </abbr>
                            </a>

                        </td>

                        <td style="text-align: center">
                            <form method="post" action="">
                                @csrf
                                @method('delete')
                                <button type="submit"><img src="{{ asset('img/icons/borrar.png') }}" width="40px">
                                </button>
                            </form>
                        </td>

                    </tr>
                {{-- @endif
            @empty
            @endforelse ($data as $item)
        @else --}}
            {{-- <h1 class="bg-warning d-flex justify-content-center">No hay proveedores para mostrar</h1>
        @endif --}}

    </table>

@endsection
