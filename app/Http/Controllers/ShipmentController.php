<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Journal;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::all();
        return view('shipments.index', compact('shipments'));
    }

    public function create()
    {
        return view('shipments.create');
    }

    public function store(Request $request)
    {
        $shipment = Shipment::create($request->all());
        return redirect()->route('shipments.index');
    }

    public function edit(Shipment $shipment)
    {
        return view('shipments.edit', compact('shipment'));
    }

    public function update(Request $request, Shipment $shipment)
    {
        $shipment->update($request->all());
        return redirect()->route('shipments.index');
    }

    public function changeStatus(Request $request, Shipment $shipment)
    {
        $shipment->status = $request->status;
        $shipment->save();

        if ($shipment->status == 'Done') {
            $price = $shipment->price;
            Journal::create(['shipment_id' => $shipment->id, 'amount' => $price, 'type' => 'Debit Cash']);
            Journal::create(['shipment_id' => $shipment->id, 'amount' => $price * 0.2, 'type' => 'Credit Revenue']);
            Journal::create(['shipment_id' => $shipment->id, 'amount' => $price * 0.8, 'type' => 'Credit Payable']);
        }

        return redirect()->route('shipments.index');
    }
}
