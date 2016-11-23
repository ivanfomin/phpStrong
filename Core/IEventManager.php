<?php
/**
 * Created by PhpStorm.
 * User: ioan
 * Date: 22.11.16
 * Time: 16:16
 */

namespace Core;


interface IEventManager
{
    public function subscribe($event, $callback);
    public function trigger($event, $arguments = []);
}