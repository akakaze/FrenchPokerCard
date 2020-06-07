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

/**
 * Class Joker
 *
 * @package Akakaze\FrenchPokerCard
 */
class Joker implements iCard
{
    protected $_jokerCode = CardCode::JOKER;

    public function getCode() : int
    {
        return $this->_jokerCode;
    }

    public function getSuit() : int
    {
        return $this->_jokerCode;
    }

    public function getRank() : int
    {
        return $this->_jokerCode;
    }

    function isJoker(): bool
    {
        return true;
    }
}
