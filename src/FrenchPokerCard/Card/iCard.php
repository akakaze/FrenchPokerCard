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
 * Interface iCard
 *
 * @package Akakaze\FrenchPokerCard\Card
 */
interface iCard 
{
    /**
     * Get the value of code
     * 
     * @return int
     */ 
    public function getCode() : int;

    /**
     * Get the value of suit
     * 
     * @return int
     */ 
    public function getSuit() : int;

    /**
     * Get the value of rank
     * 
     * @return int
     */ 
    public function getRank() : int;

    /**
     * return true if this card is joker
     *
     * @return bool
     */
    public function isJoker() : bool;
}
