<?php

class Order {
    private $id;
    private $bread;
    private $meat;
    private $cheese;
    private $vegetables;
    private $timestamp;

    function __construct($id) {
        $this->id = $id;
    }

    static function create() {
        
    }

    function getVegetables() {
        
    }
}