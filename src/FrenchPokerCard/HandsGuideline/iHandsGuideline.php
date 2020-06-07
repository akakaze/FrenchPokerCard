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
 * Class iHandsGuideline
 *
 * @package Akakaze\FrenchPokerCard\HandsGuideline
 */
interface iHandsGuideline
{
    /**
     * Return the index of PokerHands at PokerHandsJudgement
     *
     * @return int
     */ 
    public function getHandsIndex() : int;
    
    /**
     * Return the class name of PokerHands at PokerHandsJudgement
     *
     * @return string
     */ 
    public function getHandsClass() : string;

    /**
     * Return the Deck class
     *
     * @return iDeck
     */
    public function getDeck() : iDeck;
}
