<?php

namespace Tests\Feature\order;

use App\Models\Order;
use App\Services\order\OrderService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Date;
use Tests\TestCase;

class CreateOrderIdTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_order_number_is_generated_correctly()
{
    $testTime = now()->parse('2026-01-15 07:00:30');
    Date::setTestNow($testTime);

    $orderService = app(OrderService::class);
    $actualOrderNumber = $orderService->createOrderNumber();

    $expectedStart = "ORD-20260115070030-";
    
    $this->assertStringStartsWith($expectedStart, $actualOrderNumber);
    
    $this->assertEquals(24, strlen($actualOrderNumber));
    
    $this->assertMatchesRegularExpression('/^ORD-20260115070030-[A-Z0-9]{5}$/', $actualOrderNumber);
}
}
