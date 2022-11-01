<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\DetalleFactura;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoices', ['facturas' => Factura::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-invoice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFacturaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request)
        {
            $factura = Factura::create([
                'numero_factura' => $request->numero_factura,
                'cliente' => $request->cliente,
                'cajero' => $request->cajero,
                'fecha' => $request->fecha,
            ]);

            foreach ($request->producto as $key => $producto) {
                DetalleFactura::create([
                    'producto' => $producto,
                    'cantidad' => $request->cantidad[$key],
                    'precio' => $request->precio[$key],
                    'factura_id' => $factura->id,
                ]);
            }
        });
        return back()->with('status', 'Factura creada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        return view('edit-invoice', ['factura' => $factura]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFacturaRequest  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        DB::transaction(function () use ($request, $factura)
        {
            $factura->update([
                'numero_factura' => $request->numero_factura,
                'cliente' => $request->cliente,
                'cajero' => $request->cajero,
                'fecha' => $request->fecha,
            ]);

            // TODO: actualizar registros detalles de la factura
        });
        return back()->with('status', 'Factura actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        // Borrar detalles - tabla hija
        DetalleFactura::where('factura_id', $factura->id)->get()->each->delete();
        // Borrar registro - tabla padre
        $factura->delete();

        return back()->with('status', 'Factura eliminada con exito');
    }
}
