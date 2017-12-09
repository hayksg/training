<?php

namespace Training\Event;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\Event;

class GreetingServiceListenerAggregate implements ListenerAggregateInterface
{
    private $eventOnGetGreeting;
    private $listeners = [];

    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach('getGreeting', [$this, 'event1'], $priority);
        $this->listeners[] = $events->attach('getGreeting', [$this, 'event2'], $priority);
        $this->listeners[] = $events->attach('getGreeting', [$this, 'event3'], $priority);
    }

    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            $events->detach($listener);
            unset($this->listeners[$index]);
        }
    }

    public function event1(Event $event)
    {
        $params = $event->getParams();
        $this->getEventOnGetGreeting()->onGetGreeting($params);
    }

    public function event2(Event $event)
    {
        $params = $event->getParams();
        $this->getEventOnGetGreeting()->onGetGreeting($params);
    }

    public function event3(Event $event)
    {
        $params = $event->getParams();
        $this->getEventOnGetGreeting()->onGetGreeting($params);
    }

    public function setEventOnGetGreeting($eventOnGetGreeting)
    {
        $this->eventOnGetGreeting = $eventOnGetGreeting;
    }

    public function getEventOnGetGreeting()
    {
        return $this->eventOnGetGreeting;
    }
}
