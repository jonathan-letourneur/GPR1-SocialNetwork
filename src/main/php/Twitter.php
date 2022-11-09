<?php

namespace SocialNetwork;

use RuntimeException;

require 'IObservable.php';

class Twitter implements IObservable
{
    private array $observers = [];
    private array $twits = [];

    public function __construct(array $observers = [])
    {
        $this->observers = $observers;
    }

    public function getObservers(): array
    {
        return $this->observers;
    }

    public function getTwits(): array
    {
        return $this->twits;
    }

    public function subscribe(array $observers): void
    {
        foreach ($observers as $observer) {
            if (in_array($observer, $this->observers, true)) {
                throw new SubscriberAlreadyExistsException();
            }
            $this->observers[] = $observer;
        }
    }

    public function unsubscribe(IObserver $observer): void
    {
        if (count($this->observers) === 0) {
            throw new EmptyListOfSubscribersException();
        }
        if (!in_array($observer, $this->observers, true)) {
            throw new SubscriberNotFoundException();
        }
        unset($this->observers[array_search($observer, $this->observers)]);
    }

    public function notifyObservers(): void
    {
        if (count($this->observers) === 0) {
            throw new EmptyListOfSubscribersException();
        }
    }
}

class TwitterException extends RuntimeException
{
}

class EmptyListOfSubscribersException extends TwitterException
{
}

class SubscriberAlreadyExistsException extends TwitterException
{
}

class SubscriberNotFoundException extends TwitterException
{
}