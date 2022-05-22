<?php

namespace App\Game\Contracts;

// Subscriber Interface
interface SubscriberInterface {

    /**
     * @param string $event
     * @param array $eventData
     */
    public function notify(string $event, array $eventData = []);
}
