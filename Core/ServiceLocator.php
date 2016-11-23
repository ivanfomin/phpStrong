<?php

namespace Core;

class ServiceLocator
{
    /**
     * @var array
     */
    private $services = [];

    /**
     * @var array
     */
    private $instantiated = [];

    /**
     * @var array
     */
    private $shared = [];

    /**
     * instead of supplying a class here, you could also store a service for an interface
     *
     * @param string $class
     * @param object $service
     * @param bool $share
     */
    public function addInstance($class, $service, $share = true)
    {
        $this->services[$class] = $service;
        $this->instantiated[$class] = $service;
        $this->shared[$class] = $share;
    }

    /**
     * instead of supplying a class here, you could also store a service for an interface
     *
     * @param string $class
     * @param array $params
     * @param bool $share
     */
    public function addClass($class, $params = [], $share = true)
    {
        $this->services[$class] = $params;
        $this->shared[$class] = $share;
    }

    public function has($interface)
    {
        return isset($this->services[$interface]) || isset($this->instantiated[$interface]);
    }

    /**
     * @param string $class
     *
     * @return object
     */
    public function get($class)
    {
        if (isset($this->instantiated[$class]) && $this->shared[$class] === true) {
            return $this->instantiated[$class];
        }

        $args = $this->services[$class];

        $_class = new \ReflectionClass($class);
        $object = $_class->newInstanceArgs($args);

        if ($this->shared[$class] === true) {
            $this->instantiated[$class] = $object;
        }

        return $object;
    }
}