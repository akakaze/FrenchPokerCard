<?php declare(strict_types=1);
/**
 * Akakaze FrenchPokerCard
 * PHP version 7.3
 * 
 * @package   FrenchPokerCard
 * @author    Akakaze <akakazebot@gmail.com>
 * @copyright 2020 Akakaze
 */
namespace Akakaze\FrenchPokerCard\Card;

use OutOfRangeException;

/**
 * Class Card
 * 
 * @package Akakaze\FrenchPokerCard\Card
 */
class Card implements iCard
{
    protected $_code;

    public function __construct(int $code) {
        if (!CardCode::isPokerCardCode($code)) {
            throw new OutOfRangeException("Parameter {$code} is not Card Code.");
        }
        $this->_code = $code;
    }

    public function getCode() : int
    {
        return $this->_code;
    }

    public function getSuit() : int
    {
        return $this->_code & CardCode::SUIT_MASK;
    }

    public function getRank() : int
    {
        return $this->_code & CardCode::RANK_MASK;
    }

    function isJoker(): bool
    {
        return false;
    }
}