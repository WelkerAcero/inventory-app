@extends('layouts.menu')

@section('title', 'Categories')

@section('content')

    <x-button>
        <x-slot name="type">
            category
        </x-slot>
        <x-slot name="add">
            Agregar categoría
        </x-slot>
        <x-slot name="list">
            Listar categorias
        </x-slot>
    </x-button>

    <!-- Table with colgroup -->
    <table class="container-table-providers table table-striped table-hover">
        @if (!isset($error))
            <tr class="providers-table-title table-dark">
                <th>Nombre</th>
                <th>Estado</th>
                <th>Fecha de agregado</th>
                <th>Fecha de editado</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($data as $item)
                <tr class="providers-separate">
                    <td class="providers-index-center">{{ ucfirst($item->cat_name) }}</td>

                    <td class="providers-index-center">
                        @if ($item['state'] === true || $item['state'] === 'true')
                            true
                        @else
                            false
                        @endif
                    </td>

                    <td class="providers-index-center">{{ $item->created_at }}</td>

                    <td class="providers-index-center">{{ $item->updated_at }}</td>

                    <td style="text-align: center">
                        <a href="{{ route('category.edit', $item->id) }}">
                            <abbr title="Editar información" style="cursor: pointer">
                                <img src="{{ asset('img/icons/editar.png') }}" width="40px">
                            </abbr>
                        </a>
                    </td>

                    <td style="text-align: center">
                        <form method="post" action="{{ route('category.destroy', $item->id) }}">
                            @csrf
                            @method('delete')
                            <a type="button" id="btn-AlertDelete">
                                {{-- <abbr title="Eliminar información" style="cursor: pointer"> --}}
                                    <img src="{{ asset('img/icons/borrar.png') }}" width="40px">
                                {{-- </abbr> --}}
                                </a>
                        </form>
                    </td>
                </tr>
            @endforeach ($data as $key => $item)
        @else
            <h1 class="bg-warning d-flex justify-content-center">{{ $error }}</h1>
        @endif

    </table>

@endsection
