<?php

namespace Restaurant;

class Restaurant
{
    const SAY_SAME = 'Same';
    private $tables;
    private $parser;
    private $currentIdOfTable;



    public function initTable($numberOfPersons): int
    {
        return $this->addTable($numberOfPersons);
    }

    public function customerSays($tableId, $command)
    {
        //ok
        $attributesOfCustomer = $this->getAttributesOfCustomer($command);
        //ok
        ($this->tables[$tableId])->addAPersonToTable(
            new Customer($attributesOfCustomer[0],
                $attributesOfCustomer[1]));
    }

    public function createOrder($tableId)
    {
        return ($this->tables[$tableId])->showTableCommands();
    }

    public function addTable($numberOfPersons)
    {
        $this->tables[] = new Table($numberOfPersons);
        $this->currentIdOfTable = (count($this->tables)-1);
        return $this->currentIdOfTable;
    }

    public function getAttributesOfCustomer($command)
    {
        $this->parser = DoubleDotParser::getInstance();
        //ok
        $attributes = $this->parser->parser($command);
        if($attributes[1] === self::SAY_SAME){
            $attributes[1] = $this->tables[$this->currentIdOfTable]->getMealOfTheLastCommand();
        }
        return $attributes;


    }


}