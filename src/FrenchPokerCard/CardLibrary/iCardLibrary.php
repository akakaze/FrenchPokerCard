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

/**
 * Interface iCardLibrary
 *
 * @package Akakaze\FrenchPokerCard\CardLibrary
 */
interface iCardLibrary 
{
    /**
     * drawCard
     *
     * @param int $count
     * @return Akakaze\FrenchPokerCard\Card\iCard[]
     */
    public function drawCard(int $count = 1) : array;
    
    /**
     * shuffleLibrary
     *
     * @return $this
     */
    public function shuffleLibrary();
}
