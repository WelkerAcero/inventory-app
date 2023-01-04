@extends('layouts.dashboardLayouts.menu')

@section('title', 'Sales')

@section('content')

    <div class="content-responsive">
        <div class="contenedor--providers mb-4">
            <a href="{{ route('sale.create') }}" class="boton-clear provider-boton-list"><img src="img/icons/add.png"
                    width="35px"><b>Agregar venta</b></a>
            <a href="{{ route('sale.index') }}" class="boton-clear provider-boton-add"><img src="img/icons/lista.png"
                    width="35px"><b>Ventas realizadas</b></a>
        </div>

        <div style="display: flex;flex-direction:row;">

            <div style="width: 70%">
                <form>
                    <div style="width: 30%; color:white;margin-left:5%;">
                        <label for="documentId"><b>Código de producto</b> </label>
                        <input type="text" id="documentId" name="documentId" class="form-control" /><br>
                    </div>
                </form>

                <!-- Table with colgroup -->
                <table class="container-table table table-striped table-hover">

                    <tr class="providers-table-title table-dark">
                        <th>Código</th>
                        <th>Nombre producto</th>
                        <th>Cantidad</th>
                        <th>Precio U.</th>
                        <th>IVA</th>
                        <th>Remover</th>
                    </tr>

                    <tr class="providers-separate">
                        <td class="providers-index-center">12893</td>
                        <td class="providers-index-center">Yogurt</td>
                        <td class="providers-index-center">3</td>
                        <td class="providers-index-center">12.000</td>
                        <td class="providers-index-center">19</td>
                        <td class="providers-index-center"><a href="#"><img src="img/icons/borrar.png" width="25px">
                            </a>
                        </td>
                    </tr>
                </table>
            </div>

            <div style="background-color: white; width:30%; margin-right:40px;padding:20px;">
                <h1 style="text-align: center">DATOS DE VENTA</h1>
                <label for="name"><b>Nombre vendedor</b> </label>
                <input type="text" id="name" name="name" value="" class="form-control"
                    placeholder="Escriba su nombre" required="true" /><br>
                <label for="name"><b>Nombre cliente</b> </label>
                <input type="text" id="name" name="name" value="" class="form-control"
                    placeholder="Escriba su nombre" required="true" /><br>
                <label for="address"><b>Fecha</b> </label>
                <input type="date" id="address" name="address" value="" class="form-control"
                    required="true" /><br>
                <label for="address"><b>Descuento de venta (%)</b> </label>
                <input type="number" id="address" name="address" value="" class="form-control"
                    required="true" /><br>
                <label for="address"><b>Subtotal (Sin IVA)</b> </label>
                <input type="number" id="address" name="address" value="" class="form-control"
                    required="true" /><br>
                <label for="address"><b>IVA (19%)</b> </label>
                <input type="number" id="address" name="address" value="" class="form-control"
                    required="true" /><br>
                <label for="address"><b>Descuento aplicado</b> </label>
                <input type="number" id="address" name="address" value="" class="form-control"
                    required="true" /><br>
                <hr>
                <label for="address"><b>Total</b> </label>
                <input type="number" id="address" name="address" value="" class="form-control" disabled /><br>

                <div style="text-align: center; padding-bottom:20px;">
                    <input class="btn btn-success boton-create" type="submit" value="Guardar" />
                </div>
            </div>
        </div>
    </div>
@endsection
