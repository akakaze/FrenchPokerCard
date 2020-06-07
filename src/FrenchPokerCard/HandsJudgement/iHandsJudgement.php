<?php declare(strict_types=1);
/**
 * Akakaze FrenchPokerCard
 * PHP version 7.3
 * 
 * @package   FrenchPokerCard
 * @author    Akakaze <akakazebot@gmail.com>
 * @copyright 2020 Akakaze
 */
namespace Akakaze\FrenchPokerCard\HandsJudgement;

use Akakaze\FrenchPokerCard\Deck\iDeck;
use Akakaze\FrenchPokerCard\HandsGuideline\iHandsGuideline;

/**
 * interface iHandsJudgement
 *
 * @package Akakaze\FrenchPokerCard\HandsJudgement
 */
interface iHandsJudgement
{
    /**
     * Return the matched PokerHands
     *
     * @param iDeck $deck1
     * @return iPokerHands
     */ 
    public static function getPokerCardHands(iDeck $deck) : iHandsGuideline;

    /**
     * Compare two Hands, return 1, 0 or -1.
     *
     * @param iPokerHands $pokerCardHands1
     * @param iPokerHands $pokerCardHands2
     * @return int $deck1 <=> $deck2
     */
    public static function compare(iHandsGuideline $pokerCardHands1, iHandsGuideline $pokerCardHands2) : int;
}
