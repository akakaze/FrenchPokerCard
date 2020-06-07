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
 * Class Hands5ofK
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
class Hands5ofK implements iHands
{
    public static function isMatch(iDeck $deck) : bool
    {
        $acr = $deck->getArrayCountRanks();
        $jc = $deck->getJokerCount();
        // J 4
        // J J 3
        if ($jc + max($acr) === 5) {
            return true;
        }
        
        return false;
    }
}
