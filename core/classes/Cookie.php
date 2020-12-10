<?php

namespace Core;

class Cookie
{

    private $name;
    private $value;
    private $time;

    //sutvarkyti konstruktoriu
    /**
     * Cookie constructor
     */
    public function __construct()
    {
        $this->getName();
    }

    /**
     * Cookie set
     */
    public function set() {
        setcookie($this->name, $this->value, $this->time);
    }

    /**
     * Return a cookie
     *
     * @return mixed
     */
    public function get(){
        return $_COOKIE[$this->getName()];
    }

    /**
     * Delete Cookie
     */
    public function delete() {
        setcookie($this->name, null, time() - 3600);
    }

    /**
     * @param $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value) {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue() {
        return $this->value;
    }

    //sita pasiziureti
    /**
     * @param $time
     * @return bool|int
     */
    public function cookieTime($time) {
        return $this->time = $time;
    }

}

