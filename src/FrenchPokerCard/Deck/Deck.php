<?php declare(strict_types=1);
/**
 * Akakaze FrenchPokerCard
 * PHP version 7.3
 * 
 * @package   FrenchPokerCard
 * @author    Akakaze <akakazebot@gmail.com>
 * @copyright 2020 Akakaze
 */
namespace Akakaze\FrenchPokerCard\Deck;

use Akakaze\FrenchPokerCard\Card\iCard;
use LengthException;
use TypeError;

/**
 * Class Deck
 * 
 * @package Akakaze\FrenchPokerCard\Deck
 */
class Deck implements iDeck
{
    /**
     * the deck
     *
     * @var iCard[]
     */
    protected $_deck;

    /**
     * getJokerCount
     *
     * @var int
     */
    protected $_jokerCount;

    /**
     * the sortoutDeck
     *
     * @var iCard[]
     */
    protected $_sortoutCards;

    /**
     * getSuits
     *
     * @var int[]
     */
    protected $_suitsDeck;

    /**
     * getRanks
     *
     * @var int[]
     */
    protected $_ranksDeck;

    /**
     * getArrayCountSuits
     *
     * @var array
     */
    protected $_arrayCountSuits;

    /**
     * getArrayCountRanks
     *
     * @var array
     */
    protected $_arrayCountRanks;
    
    /**
     * __construct
     *
     * @param iCard[] $deck
     */
    public function __construct(array $deck) {
        try {
            $this->checkDeck($deck);
        } catch (\Throwable $th) {
            throw $th;
        }
        $this->_deck = $deck;
    }
    
    /**
     * Make sure the deck has 5 PokerCards.
     *
     * @param array $deck
     * @return void
     */
    public static function checkDeck(array $deck)
    {
        if (count($deck) !== 5) {
            throw new LengthException("Deck is not 5 cards.");
        }
        foreach ($deck as $key => $card) {
            if(!($card instanceof iCard)) {
                throw new TypeError("Index ${key} in the deck is not Card Class.");
            }
        }
    }
    
    public function getFiveCards() : array
    {
        return $this->_deck;
    }

    public function getPokerCard(int $index) : iCard
    {
        return $this->_deck[$index];
    }

    public function getSortoutCards() : array
    {
        if (is_null($this->_sortoutCards)) {
            $this->_sortoutCards = $this->_deck;
            $acr = $this->getArrayCountRanks();
            usort($this->_sortoutCards, function(iCard $a, iCard $b) use ($acr)
            {
                if ($a->isJoker() && $b->isJoker()) {
                    return 0;
                }
                $rs = $a->isJoker() <=> $b->isJoker();
                if ($rs === 0) {
                    $rs = $acr[$a->getRank()] <=> $acr[$b->getRank()];
                }
                if ($rs === 0) {
                    $rs = $a->getCode() <=> $b->getCode();
                }
                return $rs;
            });
        }
        return $this->_sortoutCards;
    }
    
    public function getSuits() : array
    {
        if (is_null($this->_suitsDeck)) {
            $this->_suitsDeck = array_map(function (iCard $mp)
            {
                return $mp->getSuit();
            }, array_filter($this->_deck, function (iCard $fp) {
                return !$fp->isJoker();
            }));
        }
        return $this->_suitsDeck;
    }

    public function getRanks() : array
    {
        if (is_null($this->_ranksDeck)) {
            $this->_ranksDeck = array_map(function (iCard $mp)
            {
                return $mp->getRank();
            }, array_filter($this->_deck, function (iCard $fp) {
                return !$fp->isJoker();
            }));
        }
        return $this->_ranksDeck;
    }
    
    public function getJokerCount() : int
    {
        if (is_null($this->_jokerCount)) {
            $this->_jokerCount = array_reduce($this->_deck, function (int $carry , iCard $item)
            {
                return $item->isJoker() ? $carry + 1 : $carry;
            }, 0);
        }
        return $this->_jokerCount;
    }
    
    public function getArrayCountSuits() : array
    {
        if (is_null($this->_arrayCountSuits)) {
            $this->_arrayCountSuits = array_count_values($this->getSuits());
        }
        return $this->_arrayCountSuits;
    }

    public function getArrayCountRanks() : array
    {
        if (is_null($this->_arrayCountRanks)) {
            $this->_arrayCountRanks = array_count_values($this->getRanks());
        }
        return $this->_arrayCountRanks;
    }
}