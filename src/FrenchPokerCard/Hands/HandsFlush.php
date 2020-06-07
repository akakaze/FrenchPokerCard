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
 * Class HandsFlush
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
class HandsFlush implements iHands
{
    public static function isMatch(iDeck $deck) : bool
    {
        $acs = $deck->getArrayCountSuits();
        $jc = $deck->getJokerCount();
        // 5*
        // 4* J
        // 3* J J
        if ($jc + max($acs) === 5) {
            return true;
        }
        
        return false;
    }
}
