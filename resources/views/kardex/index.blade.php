@extends('layouts.dashboardLayouts.menu')

@section('title', 'Kardex')

@section('content')

    <div class="btn-rs">
        <!-- Table with colgroup -->
        <table class="container-table table table-striped table-hover">

            <tr class="providers-table-title table-dark">
                {{-- <th>key</th> --}}
                <th>#</th>
                <th>Fecha</th>
                <th>Producto</th>
                <th>U.Entrada</th>
                <th>U.Salida</th>
                <th>C.U.Salida</th>
                <th>Inventario Inicial</th>
                <th>Inventario Ac.</th>
                <th>C.Inventario</th>
                <th>Acción</th>
            </tr>

            {{-- @forelse ($data as $key => $item)
            @if ($item != null) --}}
            <tr class="providers-separate">
                {{-- <td class="providers-index-center">{{ $key }}</td> --}}
                <td class="providers-index-center">1</td>
                <td class="providers-index-center">10-10-2022</td>
                <td class="providers-index-center">Yogurt</td>
                <td class="providers-index-center">Lorem</td>
                <td class="providers-index-center">Lorem</td>
                <td class="providers-index-center">Lorem</td>
                <td class="providers-index-center">Lorem</td>
                <td class="providers-index-center">Lorem</td>
                <td class="providers-index-center">Lorem</td>

                <td style="text-align: center">
                    <a href="#">
                        <abbr title="Ver detalles" style="cursor: pointer"><img
                                src="{{ asset('img/icons/detailPrint.png') }}" width="25px" alt="print">
                        </abbr>
                    </a>
                </td>

            </tr>
            {{-- @endif
        @empty
        @endforelse ($data as $item) --}}
        </table>
    </div>
@endsection
