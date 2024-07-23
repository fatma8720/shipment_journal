<?php

namespace Tests\Feature;

use App\Models\Shipment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ShipmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_shipment()
    {
        $response = $this->post('/shipments', [
            'code' => 'SHIP001',
            'shipper' => 'John Doe',
            'image' => UploadedFile::fake()->image('test.jpg'),
            'weight' => 15,
            'description' => 'Sample description',
            'status' => 'Pending'
        ]);

        $response->assertRedirect('/shipments');
        $this->assertDatabaseHas('shipments', ['code' => 'SHIP001']);
    }

    public function test_can_change_status_to_done()
    {
        $shipment = Shipment::create([
            'code' => 'SHIP002',
            'shipper' => 'Jane Doe',
            'image' => UploadedFile::fake()->image('test.jpg'),
            'weight' => 30,
            'description' => 'Sample description',
            'status' => 'Pending'
        ]);

        $response = $this->post(route('shipments.changeStatus', $shipment), ['status' => 'Done']);
        $response->assertRedirect('/shipments');
        $this->assertDatabaseHas('shipments', ['code' => 'SHIP002', 'status' => 'Done']);
    }
}


