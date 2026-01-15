<?php

namespace Tests\Feature\order;

use App\Services\order\OrderService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Date;
use Tests\TestCase;

class createOrderId extends TestCase
{
    /**
     * A basic feature test example.
     */
     public function test_order_id_is_generated_correctly()
    {
        // Mock the time to ensure a predictable timestamp
        $fixedTimestamp = 1672531200; // Example: Jan 1, 2023
        Date::setTestNow(Date::createFromTimestamp($fixedTimestamp));

        $orderService = new OrderService();
        $userId = 123;
        $expectedOrderId = "{$userId}{$fixedTimestamp}";

        // Call the public method that in turn calls the private function
        $actualOrderId = $orderService->createOrderId($userId);

        $this->assertEquals($expectedOrderId, $actualOrderId);

        // Clean up the mock
        Date::setTestNow(null);
    }
}
