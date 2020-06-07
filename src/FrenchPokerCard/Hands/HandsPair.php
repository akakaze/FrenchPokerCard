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
 * Class HandsPair
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
class HandsPair implements iHands
{
    public static function isMatch(iDeck $deck) : bool
    {
        $acr = $deck->getArrayCountRanks();
        $jc = $deck->getJokerCount();
        // 2 1 1 1
        // J 1 1 1 1
        if ($jc + max($acr) === 2) {
            return true;
        }
        
        return false;
    }
}
