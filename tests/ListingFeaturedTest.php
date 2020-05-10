<?php

use PHPUnit\Framework\TestCase;

class ListingFeaturedTest extends TestCase
{

  /** @test */
  function getStatusCheck() //Write a test for the ListingFeatured class to ensure that getStatus method returns 'featured'.
  {
    $data = [
      "id" => 1,
      "title" => "test Title",
      "status" => "featured",
      "website" => "test.com",
      "email" => "testemail@gmail.com",
      "twitter" => "TestTwitter",
      "description" => "test description"
    ];

    $listing = new ListingFeatured($data);
    $this->assertEquals("featured", $listing->getStatus());
  }

  /** @test */
  function getCocCheck() //Write a test for the ListingFeatured class to ensure that getCoc method returns the expected results.
  {
    $data = [
      "id" => 1,
      "title" => "test Title",
      "coc" => "test",
      "status" => "featured",
      "website" => "test.com",
      "email" => "testemail@gmail.com",
      "twitter" => "TestTwitter",
      "description" => "test description"
    ];

    $listing = new ListingFeatured($data);
    $this->assertEquals("test", $listing->getCoc());
  }
}
?>
