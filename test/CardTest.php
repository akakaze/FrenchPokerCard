<?php
namespace Akakaze\Test;

use Akakaze\FrenchPokerCard\Card\CardCode;
use Akakaze\FrenchPokerCard\Card\iCard;
use Akakaze\FrenchPokerCard\Card\Card;
use Akakaze\FrenchPokerCard\Card\Joker;
use PHPUnit\Framework\TestCase;

/**
 * CardTest
 * @group Card
 */
class CardTest extends TestCase
{
    /** @test
     * @dataProvider cardCodeProvider
     */
    public function test_BuildCard($suitCode, $rankCode)
    {
        $cardCode = CardCode::buildCode($suitCode, $rankCode);
        $this->assertIsInt($cardCode, "$suitCode, $rankCode, $cardCode");
        $this->assertTrue(CardCode::isPokerCardCode($cardCode));

        $card = new Card($cardCode);
        $this->assertInstanceOf(iCard::class, $card);

        $this->assertEquals($suitCode, $card->getSuit());
        $this->assertEquals($rankCode, $card->getRank());
        $this->assertEquals($cardCode, $card->getCode());
        $this->assertFalse($card->isJoker());
    }

    /** @test */
    public function test_BuildCardTypeError()
    {
        $this->expectException("OutOfRangeException");
        new Card(CardCode::MAX_CODE + 1);
    }
    
    public function cardCodeProvider()
    {
        $providers = [];
        foreach (CardCode::allSuit() as $suitCode) {
            foreach (CardCode::allRank() as $rankCode) {
                $providers[] = [$suitCode, $rankCode];
            }
        }

        return $providers;
    }

    /** @test */
    public function test_BuildJoker()
    {
        $card = new Joker;
        $this->assertInstanceOf(iCard::class, $card);

        $this->assertEquals(CardCode::JOKER, $card->getSuit());
        $this->assertEquals(CardCode::JOKER, $card->getRank());
        $this->assertEquals(CardCode::JOKER, $card->getCode());
        $this->assertTrue($card->isJoker());
    }
    
}