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
 * Interface iHands
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
interface iHands
{
    /**
     * Compare whether the deck is this hands
     *
     * @param iDeck $deck
     * @return bool
     */
    public static function isMatch(iDeck $deck) : bool;
}
