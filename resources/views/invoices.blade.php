<x-layout>
    <div class="container">
        <div class="m-5">
            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">Número de factura</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Cajero</th>
                    <th scope="col">Fecha</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($facturas as $factura)
                    <tr>
                        <td>{{ $factura->numero_factura }}</td>
                        <td>{{ $factura->cliente }}</td>
                        <td>{{ $factura->cajero }}</td>
                        <td>{{ $factura->fecha }}</td>
                        <td>
                            <a href="{{ route('factura.edit', $factura) }}">
                                <button class="btn btn-success" > 
                                    <i class="fa fa-solid fa-pen"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('factura.destroy', $factura) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button id="delete" name="delete" type="submit" 
                                        class="btn btn-danger" 
                                        data-toggle="tooltip" data-placement="top" title="Eliminar usuario"
                                        onclick="return confirm('Desea eliminar...?')">
                                        <i class="fa fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>