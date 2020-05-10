<?php

use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase
{
  /** @test */
  function exceptionMessage1 () //Exception 1 Test
  {
    $this->expectException(Exception::class);
    $listing = new ListingBasic();
  }

}



?>
