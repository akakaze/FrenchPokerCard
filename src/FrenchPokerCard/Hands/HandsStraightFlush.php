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
 * Class HandsStraightFlush
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
class HandsStraightFlush implements iHands
{
    public static function isMatch(iDeck $deck): bool
    {
        if (HandsFlush::isMatch($deck) &&
            (HandsStraight::isMatch($deck) || HandsWheel::isMatch($deck))) {
            return true;
        }
        return false;
    }
}
