@extends('layouts.dashboardLayouts.menu')

@section('title', 'Sales')

@section('content')
    <div class="contenedor--providers mb-4">
        <a href="{{ route('sale.create') }}" class="boton-clear provider-boton-add"><img src="img/icons/add.png"
                width="35px"><b>Agregar venta</b></a>
        <a href="{{ route('sale.index') }}" class="boton-clear provider-boton-list"><img src="img/icons/lista.png"
                width="35px"><b>Ventas realizadas</b></a>
    </div>

    <!-- Table with colgroup -->
    <table class="container-table-providers table table-striped table-hover">

        <tr class="providers-table-title table-dark">
            <th>Código</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Vendedor</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>

        {{-- @foreach ($data as $item)
            <tr class="providers-separate">
                <td class="providers-index-center">{{ $item['docType'] }}</td>
                <td class="providers-index-center">{{ $item['documentId'] }}</td>
                <td class="providers-index-center">{{ $item['name'] }}</td>
                <td class="providers-index-center">{{ $item['cellphone'] }}</td>
                <td class="providers-index-center">{{ $item['email'] }}</td>
                <td class="providers-index-center">{{ $item['address'] }}</td>
                <td class="providers-index-center"><a href="#"><img src="img/icons/editar.png" width="25px"> </a>
                </td>
                <td class="providers-index-center"><a href="#"><img src="img/icons/borrar.png" width="25px"> </a>
                </td>
            </tr>
        @endforeach --}}

    </table>

@endsection
