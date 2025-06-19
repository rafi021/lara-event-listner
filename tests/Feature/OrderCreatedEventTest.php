<?php

use App\Events\OrderCreatedEvent;
use Illuminate\Support\Facades\Event;
use App\Listeners\SendOrderConfirmMail;
use App\Listeners\SendAdminNotification;
use App\Listeners\SendNotificationToVendor;
use App\Listeners\SendSMSNotificationToDelivery;

test('order can be created with event listener', function () {
    Event::fake();
    
    $response = $this->get('/api/test');
    $response->assertStatus(200);

    // Assert that an event was dispatched
    Event::assertDispatched(OrderCreatedEvent::class);

    // Assert that the event was dispatched with the correct data
    Event::assertDispatched(function (OrderCreatedEvent $event) {
        return $event->order['invoice_number'] === 'INV1234';
    });

    // Assert event is Listened
    Event::assertListening(OrderCreatedEvent::class, SendOrderConfirmMail::class);
    Event::assertListening(OrderCreatedEvent::class, SendNotificationToVendor::class);
    Event::assertListening(OrderCreatedEvent::class, SendSMSNotificationToDelivery::class);
    Event::assertListening(OrderCreatedEvent::class, SendAdminNotification::class);
});
