<?php
namespace Akakaze\Test;

use Akakaze\FrenchPokerCard\Card\Card;
use Akakaze\FrenchPokerCard\Card\CardCode;
use Akakaze\FrenchPokerCard\Card\Joker;
use Akakaze\FrenchPokerCard\Deck\Deck;
use Akakaze\FrenchPokerCard\Deck\iDeck;
use PHPUnit\Framework\TestCase;

/**
 * DeckTest
 * @group Deck
 */
class DeckTest extends TestCase
{
    /** @test */
    public function cards()
    {
        $cards = [
            new Joker,
            new Card(CardCode::buildCode(CardCode::SUIT_CLOVERS, CardCode::RANK_5)),
            new Card(CardCode::buildCode(CardCode::SUIT_TILES, CardCode::RANK_6)),
            new Card(CardCode::buildCode(CardCode::SUIT_PIKES, CardCode::RANK_2)),
            new Card(CardCode::buildCode(CardCode::SUIT_HEARTS, CardCode::RANK_5)),
        ];
        $this->assertCount(5, $cards);  
        return $cards;
    }

    /** @test
     * @depends cards
     */
    public function test_Construct(array $cards)
    {
        $deck = new Deck($cards);
        $this->assertInstanceOf(iDeck::class, $deck, "test_Construct");
        return $deck;
    }

    /** @test
     * @depends cards
     * @depends test_Construct
    */
    public function test_getFiveCards(array $cards, iDeck $deck)
    {
        $this->assertEquals($deck->getFiveCards(), $cards, "test_getFiveCards");
    }
    
    /** @test
     * @depends test_Construct
     */
    public function test_getSortoutCards(iDeck $deck)
    {
        $this->assertEquals($deck->getSortoutCards(), [
            new Card(CardCode::buildCode(CardCode::SUIT_PIKES, CardCode::RANK_2)),
            new Card(CardCode::buildCode(CardCode::SUIT_TILES, CardCode::RANK_6)),
            new Card(CardCode::buildCode(CardCode::SUIT_CLOVERS, CardCode::RANK_5)),
            new Card(CardCode::buildCode(CardCode::SUIT_HEARTS, CardCode::RANK_5)),
            new Joker,
        ], "test_getSortoutCards");
    }
    
}
