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
 * Class Hands4ofK
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
class Hands4ofK implements iHands
{
    public static function isMatch(iDeck $deck) : bool
    {
        $acr = $deck->getArrayCountRanks();
        $jc = $deck->getJokerCount();
        // 4 1
        // J 3 1
        // J J 2 1
        if ($jc + max($acr) === 4) {
            return true;
        }
        
        return false;
    }
}
