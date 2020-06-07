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
 * Class HandsStraight
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
class HandsStraight implements iHands
{
    public static function isMatch(iDeck $deck) : bool
    {
        $acr = $deck->getArrayCountRanks();
        if (max($acr) === 1) {
            $min = CardCode::RANK_A;
            $max = CardCode::RANK_2;
            foreach ($deck->getFiveCards() as $card) {
                if (!$card->isJoker()) {
                    $rs = $card->getRank();
                    if ($rs < $min) {
                        $min = $rs;
                    }
                    if ($rs > $max) {
                        $max = $rs;
                    }
                }
            }
            if (CardCode::rankGap($max, $min) <= 4) {
                return true;
            }
        }

        return false;
    }
}
