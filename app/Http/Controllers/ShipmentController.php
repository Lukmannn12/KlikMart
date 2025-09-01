<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function shipment()
    {
        return view('dashboard.Shipment.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:processing,shipped,delivered',
        ]);

        $shipment = Shipment::findOrFail($id);

        $shipment->status = $request->status;

        // otomatis isi tanggal sesuai status
        if ($request->status === 'shipped') {
            $shipment->shipped_at = now();
        }

        if ($request->status === 'delivered') {
            $shipment->delivered_at = now();
        }

        $shipment->save();

        return redirect()->route('shipment.index')->with('success', 'Status pengiriman berhasil diperbarui.');
    }
}
