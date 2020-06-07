<?php declare(strict_types=1);
/**
 * Akakaze FrenchPokerCard
 * PHP version 7.3
 * 
 * @package   FrenchPokerCard
 * @author    Akakaze <akakazebot@gmail.com>
 * @copyright 2020 Akakaze
 */
namespace Akakaze\FrenchPokerCard\HandsGuideline;

use Akakaze\FrenchPokerCard\Deck\iDeck;

/**
 * Class HandsGuideline
 *
 * @package Akakaze\FrenchPokerCard\HandsGuideline
 */
class HandsGuideline implements iHandsGuideline
{
    protected $handsIndex;
    
    protected $handsClass;
    
    protected $deck;

    public function __construct(int $handsIndex, string $handsClass, iDeck $deck) {
        $this->handsIndex = $handsIndex;
        $this->handsClass = $handsClass;
        $this->deck = $deck;
    }

    public function getHandsIndex(): int
    {
        return $this->handsIndex;
    }

    public function getHandsClass(): string
    {
        return $this->handsClass;
    }

    public function getDeck() : iDeck
    {
        return $this->deck;
    }
}
