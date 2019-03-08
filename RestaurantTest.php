<?php

namespace Restaurant;

require ("Customer.php");
require ("Formatter.php");
require ("ComaStringFormatter.php");
require ("ParserString.php");
require("DoubleDotParser.php");
require ("Table.php");
require ("Restaurant.php");


use PHPUnit\Framework\TestCase;

class RestaurantTest extends TestCase
{
    /**
     * @test
     */
    public function createOrder() {
        $restaurant = new Restaurant();
		$tableId = $restaurant->initTable(4);
		$restaurant->customerSays($tableId, "Joe: Soup");
		$restaurant->customerSays($tableId, "Jim: Same");
		$restaurant->customerSays($tableId, "Jack: Chips");
		$restaurant->customerSays($tableId, "John: Chips");
		$this->assertEquals("Soup, Soup, Chips, Chips",
            $restaurant->createOrder($tableId));
	}

	/**
     * @test
     */
	public function failedCreationBecauseNotEveryoneOrdered() {
        $restaurant = new Restaurant();
		$tableId = $restaurant->initTable(4);
		$restaurant->customerSays($tableId, "Joe: Soup");
		$restaurant->customerSays($tableId, "Joe: Spaghetti");
		$restaurant->customerSays($tableId, "Jim: Roastbeef");
		assertEquals("MISSING 2", $restaurant->createOrder($tableId));
		$restaurant->customerSays($tableId, "Jack: Spaghetti");
		$restaurant->customerSays($tableId, "John: Chips");
		assertEquals("Spaghetti, Roastbeef, Spaghetti, Chips",
            $restaurant->createOrder($tableId));
	}

	/**
     * @test
     */
	public function failedCreationBecauseNotEnoughPeopleForADishFor2() {

        $restaurant = new Restaurant();
		$tableId = $restaurant->initTable(4);
		$restaurant->customerSays($tableId, "Joe: Soup");
		$restaurant->customerSays($tableId, "Jim: Same");
		$restaurant->customerSays($tableId, "Joe: Fish for 2");
		$restaurant->customerSays($tableId, "Jack: Chips");
		$restaurant->customerSays($tableId, "John: Chips");
		assertEquals("MISSING 1 for Fish for 2",
            $restaurant->createOrder($tableId));
		$restaurant->customerSays($tableId, "John: Fish for 2");
		assertEquals("Fish for 2, Soup, Chips, Fish for 2",
            $restaurant->createOrder($tableId));
	}
}