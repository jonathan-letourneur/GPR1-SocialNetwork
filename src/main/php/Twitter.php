<?php

namespace SocialNetwork;

use RuntimeException;

require 'IObservable.php';

class Twitter implements IObservable
{

    private $observers;

    public function __construct()
    {
        $this->observers = array();
    }

    public function subscribe(array $observers):void
    {
        throw new RuntimeException();
    }

    public function unsubscribe(IObserver $observer):void
    {
        throw new RuntimeException();
    }

    public function notifyObservers():void
    {
        throw new RuntimeException();
    }

    public function getObservers():array
    {
        return $this->observers;
        //throw new RuntimeException();
    }
}

class TwitterException extends RuntimeException { }
class EmptyListOfSubscribersException extends TwitterException { }
class SubscriberAlreadyExistsException extends TwitterException { }
class SubscriberNotFoundException extends TwitterException { }
