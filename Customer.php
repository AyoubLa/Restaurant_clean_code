<?php

namespace Restaurant;


class Customer
{
    private $name;
    private $meal;

    public function __construct($name, $meal)
    {
        $this->name = $name;
        $this->meal = $meal;
    }

    public function isTheSameCustomer(Customer $customer)
    {
        return ($this->name === $customer->name);
    }

    public function getMeal()
    {
        return $this->meal;
    }

    public function setMeal($meal)
    {
        $this->meal = $meal;
    }
}