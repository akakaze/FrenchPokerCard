<?php declare(strict_types=1);
/**
 * Akakaze FrenchPokerCard
 * PHP version 7.3
 * 
 * @package   FrenchPokerCard
 * @author    Akakaze <akakazebot@gmail.com>
 * @copyright 2020 Akakaze
 */
namespace Akakaze\FrenchPokerCard\Hands;

use Akakaze\FrenchPokerCard\Deck\iDeck;

/**
 * Class HandsTwoPairs
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
class HandsTwoPairs implements iHands
{
    public static function isMatch(iDeck $deck) : bool
    {
        $acr = $deck->getArrayCountRanks();
        $jc = $deck->getJokerCount();
        $akacr2 = array_keys($acr, 2);
        // 2 2 1
        // 2 1 1 J
        if ($jc + count($akacr2) === 2) {
            return true;
        }
        
        return false;
    }
}
