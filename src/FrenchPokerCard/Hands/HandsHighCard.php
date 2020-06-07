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
 * Class HandsHighCard
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
class HandsHighCard implements iHands
{
    public static function isMatch(iDeck $deck): bool
    {
        return true;
    }
}
