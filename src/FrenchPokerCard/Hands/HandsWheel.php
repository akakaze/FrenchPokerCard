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

use Akakaze\FrenchPokerCard\Card\CardCode;
use Akakaze\FrenchPokerCard\Deck\iDeck;

/**
 * Class HandsWheel
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
class HandsWheel implements iHands
{
    public static function isMatch(iDeck $deck) : bool
    {
        static $wheel = [
            CardCode::RANK_A,
            CardCode::RANK_2,
            CardCode::RANK_3,
            CardCode::RANK_4,
            CardCode::RANK_5,
        ];
        $acr = $deck->getArrayCountRanks();
        if (max($acr) === 1) {
            $rd = $deck->getRanks();
            $adrd = array_diff($rd, $wheel);
            if (empty($adrd)) {
                return true;
            }
        }

        return false;
    }
}
