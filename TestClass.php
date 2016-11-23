<?php


class TestClass
{
    private $str;
    private $int;

    /**
     * MyClass constructor.
     * @param $str
     * @param $int
     */
    public function __construct($str, $int)
    {
        $this->str = $str;
        $this->int = $int;
    }

    /**
     * @return mixed
     */
    public function getStr()
    {
        return $this->str;
    }

    /**
     * @param mixed $str
     */
    public function setStr($str)
    {
        $this->str = $str;
    }

    /**
     * @return mixed
     */
    public function getInt()
    {
        return $this->int;
    }

    /**
     * @param mixed $int
     */
    public function setInt($int)
    {
        $this->int = $int;
    }


}