<?php

namespace Core;

class EventManager implements IEventManager
{
    private $listeners = [];

    public function subscribe($event, $callback)
    {
        if (is_callable($callback)) {
            $this->listeners[$event][] = $callback;
        }
    }

    public function trigger($event, $arguments = [])
    {
        if (is_array($this->listeners[$event]) && count($this->listeners[$event]) > 0) {
            foreach ($this->listeners[$event] as $callback) {
                $return = call_user_func_array($callback, $arguments);

                if ($return === false) {
                    return;
                }
            }
        }
    }
}
