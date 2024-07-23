<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Http\Requests\CreateShipmentRequest;
use App\Http\Requests\updateShipmentRequest;
use Illuminate\Http\Request;
use App\Http\Services\ShipmentService;

class ShipmentController extends Controller
{
    public $shipmentService;

    public function __construct(ShipmentService $shipmentService)
    {
        $this->shipmentService = $shipmentService;
    }

    public function index()
    {
        $shipments = Shipment::all();
        return view('shipments.index', compact('shipments'));
    }

    public function create()
    {
        return view('shipments.create');
    }

    public function store(CreateShipmentRequest $request)
    {
        $shipmentData = $request->validated();
        $this->shipmentService->store($shipmentData);

        return redirect()->route('shipments.index');
    }

    public function edit(Shipment $shipment)
    {
        return view('shipments.edit', compact('shipment'));
    }

    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        $shipmentData = $request->validated();
        $this->shipmentService->update($shipment, $shipmentData);

        return redirect()->route('shipments.index');
    }

    public function changeStatus(Request $request, Shipment $shipment)
    {
        $request->validate([
            'status' => 'required|in:Pending,Progress,Done',
        ]);

        $this->shipmentService->changeStatus($shipment, $request->status);

        return redirect()->route('shipments.index');
    }
}
