<?php declare(strict_types=1);
/**
 * Akakaze FrenchPokerCard
 * PHP version 7.3
 * 
 * @package   FrenchPokerCard
 * @author    Akakaze <akakazebot@gmail.com>
 * @copyright 2020 Akakaze
 */
namespace Akakaze\FrenchPokerCard\HandsJudgement;

use Akakaze\FrenchPokerCard\Deck\iDeck;
use Akakaze\FrenchPokerCard\Hands\Hands3ofK;
use Akakaze\FrenchPokerCard\Hands\Hands4ofK;
use Akakaze\FrenchPokerCard\Hands\Hands5ofK;
use Akakaze\FrenchPokerCard\Hands\HandsFlush;
use Akakaze\FrenchPokerCard\Hands\HandsFullHouse;
use Akakaze\FrenchPokerCard\Hands\HandsHighCard;
use Akakaze\FrenchPokerCard\Hands\HandsPair;
use Akakaze\FrenchPokerCard\Hands\HandsStraight;
use Akakaze\FrenchPokerCard\Hands\HandsStraightFlush;
use Akakaze\FrenchPokerCard\Hands\HandsTwoPairs;
use Akakaze\FrenchPokerCard\Hands\HandsWheel;
use Akakaze\FrenchPokerCard\HandsGuideline\HandsGuideline;
use Akakaze\FrenchPokerCard\HandsGuideline\iHandsGuideline;

/**
 * Class HandsJudgement
 *
 * @package Akakaze\FrenchPokerCard\Hands
 */
class HandsJudgement implements iHandsJudgement
{
    /**
     * Hands list
     *
     * @var string[]
     */
    protected static $_handsList = [
        Hands5ofK::class,
        HandsStraightFlush::class,
        Hands4ofK::class,
        HandsFullHouse::class,
        HandsFlush::class,
        HandsStraight::class,
        HandsWheel::class,
        Hands3ofK::class,
        HandsTwoPairs::class,
        HandsPair::class,
        HandsHighCard::class,
    ];

    public static function getPokerCardHands(iDeck $deck) : iHandsGuideline
    {
        foreach (self::$_handsList as $key => $hands) {
            if ($hands::isMatch($deck)) {
                return new HandsGuideline($key, $hands, $deck);
            }
        }
    }

    public static function compare(iHandsGuideline $pokerCardHands1, iHandsGuideline $pokerCardHands2) : int
    {
        $compare = -($pokerCardHands1->getHandsIndex() <=> $pokerCardHands2->getHandsIndex());
        $deck1 = $pokerCardHands1->getDeck();
        $deck2 = $pokerCardHands2->getDeck();
        if ($compare === 0) {
            $sc1 = $deck1->getSortoutCards();
            $sc2 = $deck2->getSortoutCards();
            $jc1 = $deck1->getJokerCount();
            $jc2 = $deck2->getJokerCount();
            $i = 4 - max($jc1, $jc2);
            do {
                $chead1 = $sc1[$i];
                $chead2 = $sc2[$i];
                $compare = $chead1->getCode() <=> $chead2->getCode();
            } while ($compare === 0 && --$i >= 0);
        }
        return $compare;
    }
}
