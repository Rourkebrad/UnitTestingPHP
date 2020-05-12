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
      "status" => "premium",
      "website" => "test.com",
      "email" => "testemail@gmail.com",
      "twitter" => "TestTwitter",
      "description" => "test description"
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
      "description" => "test Description",
      "status" => "premium",
      "website" => "test.com",
      "email" => "testemail@gmail.com",
      "twitter" => "TestTwitter",
      "description" => "test description"
    ];

    $listing = new ListingPremium($data);
    $this->assertEquals("test description", $listing->getDescription());
  }


      /** @test */
     function tagsAllowed()
     {
         $this->assertStringMatchesFormat(
            htmlspecialchars('<p><br><b><strong><em><u><ol><ul><li>'),
             ListingPremium::displayAllowedTags()
            );

     }






}
