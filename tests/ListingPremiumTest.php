<?php

use PHPUnit\Framework\TestCase;

class ListingPremiumTest extends TestCase
{
  /** @test */
  function getStatusCheck() //Write a test for the ListingPremium class to ensure that getStatus method returns 'premium'.
  {
    $data = [
      "id" => 1,
      "title" => "test Title",
      "status" => "premium"
    ];

    $listing = new ListingPremium($data);
    $this->assertEquals("premium", $listing->getStatus());
  }

  /** @test */
  function getDescriptionCheck() //Write a test for the ListingPremium class to ensure that getDescription method returns the expected results.
  {
    $data = [
      "id" => 1,
      "title" => "test Title",
      "description" => "test Description"
    ];

    $listing = new ListingPremium($data);
    $this->assertEquals("test Description", $listing->getDescription());
  }









}
