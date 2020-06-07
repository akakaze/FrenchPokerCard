<?php declare(strict_types=1);
/**
 * Akakaze FrenchPokerCard
 * PHP version 7.3
 * 
 * @package   FrenchPokerCard
 * @author    Akakaze <akakazebot@gmail.com>
 * @copyright 2020 Akakaze
 */
namespace Akakaze\FrenchPokerCard\Deck;

use Akakaze\FrenchPokerCard\Card\iCard;

/**
 * Interface iDeck
 *
 * @package Akakaze\FrenchPokerCard\Deck
 */
interface iDeck
{
    /**
     * Get the card array of the deck, keep the original order
     *
     * @return iCard[]
     */
    public function getFiveCards() : array;
    
    /**
     * Get the card
     *
     * @param int $index
     * @return iCard
     */
    public function getPokerCard(int $index) : iCard;

    /**
     * Get the sorted card array 
     *
     * @return iCard[]
     */
    public function getSortoutCards() : array;

    /**
     * Suit for each card
     *
     * @return int[] suitCode[]
     */
    public function getSuits() : array;

    /**
     * Rank for each card
     *
     * @return int[] rankCode[]
     */
    public function getRanks() : array;
    
    /**
     * Joker count in the deck
     *
     * @return int
     */
    public function getJokerCount() : int;

    /**
     * Calculate the number of each suit in the deck, use array_count_values
     *
     * @return array
     */
    public function getArrayCountSuits() : array;

    /**
     * Calculate the number of each rank in the deck, use array_count_values
     *
     * @return array
     */
    public function getArrayCountRanks() : array;
}
