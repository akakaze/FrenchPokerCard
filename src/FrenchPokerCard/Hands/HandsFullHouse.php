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
 * Class HandsFullHouse
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
class HandsFullHouse implements iHands
{
    public static function isMatch(iDeck $deck) : bool
    {
        $acr = $deck->getArrayCountRanks();
        $jc = $deck->getJokerCount();
        $akacr3 = array_keys($acr, 3);
        $akacr2 = array_keys($acr, 2);
        // 3 2
        // J 2 2
        if ($jc === 0 && count($akacr3) === 1 && count($akacr2) === 1) {
            return true;
        }
        if ($jc === 1 && count($akacr2) === 2) {
            return true;
        }
        
        return false;
    }
}
