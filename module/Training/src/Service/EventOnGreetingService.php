<?php

namespace Training\Service;

use Training\Service\EventOnGreetingServiceInterface;

class EventOnGreetingService implements EventOnGreetingServiceInterface
{
    public function onGetGreeting(array $params)
    {
        echo "Some event on 'getGreeting' service with param 'hour' = {$params['hour']}";
    }
}
