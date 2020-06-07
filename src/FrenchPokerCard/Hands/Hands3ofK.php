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
 * Class Hands3ofK
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
class Hands3ofK implements iHands
{
    public static function isMatch(iDeck $deck) : bool
    {
        $acr = $deck->getArrayCountRanks();
        $jc = $deck->getJokerCount();
        // 3 1 1
        // J 2 1 1
        // J J 1 1 1
        if ($jc + max($acr) === 3) {
            return true;
        }
        
        return false;
    }
}
