<?php


class Worker
{
    private $className;

    public function __construct(SaveString $saveString)
    {
        $this->className = $saveString;
    }

    public function work($str)
    {
        $this->className->save($str);
    }

}