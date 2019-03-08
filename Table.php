<?php

namespace Restaurant;

use Restaurant\Formatters\ComaStringFormatter;

class Table
{
    private $table = array();
    private $numberOfCustomers;
    private $formatter;

    public function __construct($numberOfCustomers)
    {
        $this->numberOfCustomers = $numberOfCustomers;
    }

    public function addAPersonToTable(Customer $customer)
    {
        if($indexOfCustomer = $this->containACustomer($customer)) {
            $this->table[$indexOfCustomer]->setMeal($customer->getMeal());

        }else {
            $this->table[] = $customer;
        }
    }

    public function tableIsEmpty()
    {
        return (\count($this->table) === 0);
    }

    public function containACustomer(Customer $customer)
    {
        foreach ($this->table as $key => $oneCustomer) {

            return ($customer->isTheSameCustomer($oneCustomer))? $key: false;
        }

        return false;
    }

    public function isAFullTable()
    {
        return (\count($this->table) === $this->numberOfCustomers);
    }

    public function showTableCommands()
    {
        $this->formatter = ComaStringFormatter::getInstance();
        return $this->formatter->formatter($this->table);
    }

    public function getMealOfTheLastCommand()
    {
        if(count($this->table) !== 0){
            $index = count($this->table) -1;
            return $this->table[$index]->getMeal();
        }
        return '';

    }
}