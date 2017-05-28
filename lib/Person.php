<?php

abstract class Person {
    protected $name;
    protected $phone;
    protected $email;
    protected $image;
    
    public function __construct($name, $phone, $email, $image) {
        $this->name = filter_var($name, FILTER_SANITIZE_STRING);
        $this->phone = filter_var($phone, FILTER_SANITIZE_STRING);
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->image = $image;
    }  
}