<x-layout>
    <div class="m-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="container p-5">
        <form method="POST" action="{{ route('factura.update', $factura) }}">
            @method('PUT')
            {{-- CREAR TOKEN PARA LAS SOLICITUDES HTTP --}}
            @csrf
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Número de factura</label>
                            <input name="numero_factura" value="{{ $factura->numero_factura }}" type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Cliente</label>
                            <input name="cliente" value="{{ $factura->cliente }}" type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Cajero</label>
                            <input name="cajero" value="{{ $factura->cajero }}" type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input name="fecha" value="{{ $factura->fecha }}" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">producto</th>
                                <th scope="col">precio</th>
                                <th scope="col">cantidad</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>
                                    <input name="producto[]" type="text" class="form-control" id="" placeholder="">
                                </td>
                                <td>
                                    <input name="precio[]" type="text" class="form-control" id="" placeholder="">
                                </td>
                                <td>
                                    <input name="cantidad[]" type="text" class="form-control" id="" placeholder="">
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>
                                    <input name="producto[]" type="text" class="form-control" id="" placeholder="">
                                </td>
                                <td>
                                    <input name="precio[]" type="text" class="form-control" id="" placeholder="">
                                </td>
                                <td>
                                    <input name="cantidad[]" type="text" class="form-control" id="" placeholder="">
                                </td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>