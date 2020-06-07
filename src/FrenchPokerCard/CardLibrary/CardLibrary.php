<?php declare(strict_types=1);
/**
 * Akakaze FrenchPokerCard
 * PHP version 7.3
 * 
 * @package   FrenchPokerCard
 * @author    Akakaze <akakazebot@gmail.com>
 * @copyright 2020 Akakaze
 */
namespace Akakaze\FrenchPokerCard\CardLibrary;

use Akakaze\FrenchPokerCard\Card\CardCode;
use Akakaze\FrenchPokerCard\Card\Card;
use Akakaze\FrenchPokerCard\Card\Joker;
use OutOfRangeException;
use TypeError;

/**
 * Class CardLibrary
 *  
 * @package Akakaze\FrenchPokerCard\CardLibrary
 */
class CardLibrary implements iCardLibrary
{
    protected $_library = [];

    /**
     * Card library with 52 cards and a selectable number of jokers.
     *
     * @param integer $joker
     */
    public function __construct(int $joker = 0) {
        $this->_library = range(CardCode::MIN_CODE, CardCode::MAX_CODE);
        for ($i=0; $i < $joker; $i++) {
            $this->_library[] = CardCode::JOKER;
        }
    }
    
    public function drawCard(int $count = 1) : array
    {
        $libraryRemain = count($this->_library);
        if ($count >= $libraryRemain) {
            $msg = "Over the total number of cards, there are ${libraryRemain} cards left, and the parameters require ${count}.";
            throw new OutOfRangeException($msg);
        }
        $draw = array_splice($this->_library, 0, $count);
        return array_map(function($code) {
            if (CardCode::isPokerCardCode($code)) {
                return new Card($code);
            }
            if (CardCode::isJokerCode($code)) {
                return new Joker;
            }
            throw new TypeError("Error Processing Request", 1);
        }, $draw);
    }

    public function shuffleLibrary()
    {
        shuffle($this->_library);

        return $this;
    }
}