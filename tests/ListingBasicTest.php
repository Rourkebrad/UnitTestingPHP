<?php

use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase
{
  /** @test */
  function exceptionMessage1() //Exception 1 Test - test for empty data
  {
    $this->expectException(Exception::class);

    $data = [];

    $listing = new ListingBasic($data);
  }

  /** @test */
  function exceptionMessage2() //Exception 2 - test for invalid ID
  {
    $this->expectException(Exception::class);
    $data = ["id"=>null, "title" => "test"];
    $listing = new ListingBasic($data);
    $listing->setValues($data = ["id" => null,"title" => "test"]);
  }

  /** @test */
  function exceptionMessage3() //Exception 3 - test for invalid title
  {
    $this->expectException(Exception::class);
    $data = ["id" => 1,"title"=>null];
    $listing = new ListingBasic($data);
    $listing->setValues($data = ["id"=> 1, "title" => null]);
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
    $this->assertEquals($data['id'], $listing->getId());
    $this->assertEquals($data['title'], $listing->getTitle());
    $this->assertEquals($data['website'], $listing->getWebsite());
    $this->assertEquals($data['email'], $listing->getEmail());
    $this->assertEquals($data['twitter'], $listing->getTwitter());
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
      "twitter" => "TestTwitter",
      "status" => "basic"
    ], $listing->toArray());

  }

  /** @test */
   function websiteNotSetCheck()
   {
       $data = [
           'id' => 2,
           'title' => 'test no site',
           'website' => ''
       ];

       $listing = new ListingBasic($data);
       $this->assertNull($listing->getWebsite());
   }

   /** @test */
   function websiteSiteCheck()
   {
        $data = [
            'id' => 3,
            'title' => 'test',
            'website' => 'test.com'
        ];

        $listing = new ListingBasic($data);
        $this->assertStringMatchesFormat(
            $listing->getWebsite(),
            'http://' . $data['website']
        );
    }

    /** @test */
    function isStatusEmpty()
    {
        $data = [
            'id' => 9,
            'title' => 'test',
            'status' => ''
        ];

        $listing = new ListingBasic($data);
        $this->assertEquals("basic",$listing->getStatus());
    }

    public function testNoImage()
    {
        $data = [
            'id' => 1,
            'title' => 'Test Title',
            'image' => '',
        ];
        $listing = new ListingBasic($data);
        $this->assertFalse($listing->getImage());

    }

    public function testFullPathImage()
    {
        $data = [
            'id' => 1,
            'title' => 'Test Title',
            'image' => 'https://www.cascadiaphp.com/images/logo.svg',
        ];
        $listing = new ListingBasic($data);
        $this->assertEquals($data['image'], $listing->getImage());

    }
  /*  public function testBuildPathImage()
    {
        define('BASE_URL', '/');
        $data = [
            'id' => 1,
            'title' => 'Test Title',
            'image' => 'images/listings/1.png',
        ];
        $listing = new ListingBasic($data);
        $this->assertEquals(BASE_URL.'/'.$data['image'], $listing->getImage());
    }
*/
}



?>
