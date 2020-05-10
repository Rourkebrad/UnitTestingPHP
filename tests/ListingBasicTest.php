<?php

use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase
{
  /** @test */
  function exceptionMessage1() //Exception 1 Test - test for empty data
  {
    $this->expectException(Exception::class);
    $listing = new ListingBasic();
  }

  /** @test */
  function exceptionMessage2() //Exception 2 - test for invalid ID
  {
    $this->expectException(Exception::class);
    $idTest = ["id"=>null];
    $listing = new ListingBasic($idTest);
  }

  /** @test */
  function exceptionMessage3() //Exception 3 - test for invalid title
  {
    $this->expectException(Exception::class);
    $titleTest = ["title"=>null];
    $listing = new ListingBasic($titleTest);
  }

  /** @test */
  function checkObjectCreated() // Test to check a object us created after min is set, id and title
  {
    $data = ["id"=> "2", "title"=>"test Title"];
    $listing = new ListingBasic($data);
    $this->assertIsObject($listing);
  }

  /** @test */
  function getStatusCheck() // Test to check that getStatus method returns 'basic'
  {
    $data = ["id"=> "2", "title"=>"test Title","status" => "basic"];
    $listing = new ListingBasic($data);
    $this->assertEquals("basic", $listing->getStatus(), "Test did not pass!");
  }

  /** @test */
  function getMethodCheck() //Test to check that the get method for each property is returning the expected results: id, title, website, email, twitter
  {
    $data = [
      "id" => 1,
      "title" => "test Title",
      "website" => "http://www.test.com",
      "email" => "testemail@gmail.com",
      "twitter" => "TestTwitter"
    ];

    $listing = new ListingBasic($data);
    $this->assertEquals(1, $listing->getId());
    $this->assertEquals("test Title", $listing->getTitle());
    $this->assertEquals("http://www.test.com", $listing->getWebsite());
    $this->assertEquals("testemail@gmail.com", $listing->getEmail());
    $this->assertEquals("TestTwitter", $listing->getTwitter());
  }

  /** @test */
  function ArrayMethodCheck() //ensure that the toArray method returns an array where each item equals the expected results: id, title, website, email, twitter
  {
    $data = [
      "id" => "1",
      "title" => "test Title",
      "website" => "http://www.test.com",
      "email" => "testemail@gmail.com",
      "twitter" => "TestTwitter"
    ];

    $listing = new ListingBasic($data);

    $this->assertEquals([
      "id" => "1",
      "title" => "test Title",
      "website" => "http://www.test.com",
      "email" => "testemail@gmail.com",
      "twitter" => "TestTwitter"
    ], $listing->toArray());

  }
}



?>
