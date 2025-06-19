<?php

namespace App\Http\Controllers\API;

use App\Events\OrderCreatedEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
    public function handle(Request $request): JsonResponse
    {
        // A dummy Order with Invoice Number
        $order = [
            'invoice_number' => 'INV1234',
        ];

        // 1. Create a new Order Business Logic
        // 2. Send a Order Confirmation Mail to Customer
        // 3. Send a Notification to Vendor to Prepare Product
        // 4. Send a SMS Notification to Delivery Partner to Collect Product from Vendor
        // 5. Send a Notification to E-Commerce Admin
        OrderCreatedEvent::dispatch($order);

        return response()->json('Order Done');
    }
}
