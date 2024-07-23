<?php

namespace App\Http\Services;

use App\Models\Shipment;
use App\Models\Journal;
use Illuminate\Support\Facades\Storage;

class ShipmentService
{
    public function store($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images', 'public');
        }

        $data['price'] = $this->calculatePrice($data['weight']);
        $shipment = Shipment::create($data);

        $this->handleStatusChange($shipment);
    }

    public function update(Shipment $shipment, $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images', 'public');
        } else {
            $data['image'] = $shipment->image;
        }

        $data['price'] = $this->calculatePrice($data['weight']);
        $shipment->update($data);

        $this->handleStatusChange($shipment);
    }

    public function calculatePrice($weight)
    {
        switch (true) {
            case ($weight >= 1 && $weight < 10):
                return 10;
            case ($weight >= 10 && $weight < 25):
                return 100;
            case ($weight >= 25):
                return 300;
            default:
                return 0;
        }
    }
    
    public function handleStatusChange($shipment)
    {
        if ($shipment->status == 'Done') {
            $price = $shipment->price;
            Journal::create(['shipment_id' => $shipment->id, 'amount' => $price, 'type' => 'Debit Cash']);
            Journal::create(['shipment_id' => $shipment->id, 'amount' => $price * 0.2, 'type' => 'Credit Revenue']);
            Journal::create(['shipment_id' => $shipment->id, 'amount' => $price * 0.8, 'type' => 'Credit Payable']);
        }
    }

    public function changeStatus(Shipment $shipment, $status)
    {
        $shipment->status = $status;
        $shipment->save();

        $this->handleStatusChange($shipment);
    }
}
