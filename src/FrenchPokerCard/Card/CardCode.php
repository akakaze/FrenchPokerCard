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
 * abstract class CardCode
 *
 * @package Akakaze\FrenchPokerCard\Card
 */
abstract class CardCode 
{
    const MIN_CODE      = 0b11000000;
    const MAX_CODE      = 0b11110011;

    const SUIT_MASK     = 0b01000011;
    const SUIT_CLOVERS  = 0b01000000;
    const SUIT_TILES    = 0b01000001;
    const SUIT_HEARTS   = 0b01000010;
    const SUIT_PIKES    = 0b01000011;

    const RANK_MASK     = 0b10111100;
    const RANK_2        = 0b10000000;
    const RANK_3        = 0b10000100;
    const RANK_4        = 0b10001000;
    const RANK_5        = 0b10001100;
    const RANK_6        = 0b10010000;
    const RANK_7        = 0b10010100;
    const RANK_8        = 0b10011000;
    const RANK_9        = 0b10011100;
    const RANK_10       = 0b10100000;
    const RANK_J        = 0b10100100;
    const RANK_Q        = 0b10101000;
    const RANK_K        = 0b10101100;
    const RANK_A        = 0b10110000;

    const JOKER         = 0b11111111;

    /**
     * allSuit
     * 
     * @return int[]
     */
    public static function allSuit() : array
    {
        static $allSuit = [
            self::SUIT_CLOVERS,
            self::SUIT_TILES,
            self::SUIT_HEARTS,
            self::SUIT_PIKES,
        ];
        return $allSuit;
    }

    /**
     * allRank
     * 
     * @return int[]
     */
    public static function allRank() : array
    {
        static $allRank = [
            self::RANK_2,
            self::RANK_3,
            self::RANK_4,
            self::RANK_5,
            self::RANK_6,
            self::RANK_7,
            self::RANK_8,
            self::RANK_9,
            self::RANK_10,
            self::RANK_J,
            self::RANK_Q,
            self::RANK_K,
            self::RANK_A,
        ];
        return $allRank;
    }
    
    /**
     * Check if the parameter is a valid code of Card
     *
     * @param int $code
     *
     * @return bool
     */
    public static function isPokerCardCode(int $code) : bool
    {
        return $code >= self::MIN_CODE && $code <= self::MAX_CODE;
    }

    /**
     * Check if the parameter is JOKER code
     *
     * @param int $code
     *
     * @return bool
     */
    public static function isJokerCode(int $code) : bool
    {
        return $code === self::JOKER;
    }

    /**
     * Check if the parameter is a valid suit code of Card
     *
     * @param int $suitCode
     *
     * @return bool
     */
    public static function isSuitCode(int $suitCode) : bool
    {
        return $suitCode === ($suitCode & self::SUIT_MASK);
    }

    /**
     * Check if the parameter is a valid rank code of Card
     *
     * @param int $rankCode
     *
     * @return bool
     */
    public static function isRankCode(int $rankCode) : bool
    {
        return ($rankCode !== self::RANK_MASK) && $rankCode === ($rankCode & self::RANK_MASK);
    }

    /**
     * Real gap between two rank code
     *
     * @param integer $rankCode1
     * @param integer $rankCode2
     * @return integer|false rank1 - rank2 | $rankCode1 or $rankCode2 not RankCode
     */
    public static function rankGap(int $rankCode1, int $rankCode2)
    {
        if (self::isRankCode($rankCode1) && self::isRankCode($rankCode2)) {
            return ($rankCode1 - $rankCode2) >> 2;
        }
        return false;
    }

    /**
     * Input suit code and rank code, output card code
     *
     * @param integer $suitCode
     * @param integer $rankCode
     * @return integer|false card code | $suitCode not SuitCode or $rankCode not RankCode
     */
    public static function buildCode(int $suitCode, int $rankCode)
    {
        if (self::isSuitCode($suitCode) && self::isRankCode($rankCode)) {
            return $suitCode | $rankCode;
        }
        return false;
    }
}
