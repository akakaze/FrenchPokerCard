<?php

namespace Akakaze\Test;

use Akakaze\FrenchPokerCard\Card\iCard;
use Akakaze\FrenchPokerCard\CardLibrary\CardLibrary;
use PHPUnit\Framework\TestCase;

/**
 * CardLibraryTest
 * @group CardLibrary
 */
class CardLibraryTest extends TestCase
{
    /** @test */
    public function test_Draw()
    {
        $cardLibrary = new CardLibrary(2);
        $cards = $cardLibrary->drawCard(5);
        $this->assertCount(5, $cards);
        foreach ($cards as $key => $card) {
            $this->assertInstanceOf(iCard::class, $card, "The #{$key} element is not instance of iCard");
        }

        $this->expectException("OutOfRangeException");
        $cardLibrary->drawCard(99);
    }

}
