<?php

namespace Akakaze\Test;

use Akakaze\FrenchPokerCard\Card\CardCode;
use PHPUnit\Framework\TestCase;

/**
 * CardCodeTest
 * @group Card
 */
class CardCodeTest extends TestCase
{
    /** @test */
    public function test_CardCodeRange()
    {
        $codeRange = CardCode::MAX_CODE - CardCode::MIN_CODE;
        $this->assertNotEquals(52, $codeRange);
    }

    /** @test */
    public function test_allSuitRank()
    {
        $this->assertCount(4, CardCode::allSuit());
        $this->assertCount(13, CardCode::allRank());
    }
    
    /** @test
     * @depends test_allSuitRank
     * @dataProvider rankGapEqualsProvider
     */
    public function test_rankGapEquals($rankCode1, $rankCode2, $expected)
    {
        $actual = CardCode::rankGap($rankCode1, $rankCode2);
        $this->assertEquals($expected, $actual);

    }
    
    /** @test */
    public function test_rankGapFalse()
    {
        $condition = CardCode::rankGap(CardCode::JOKER, CardCode::RANK_2);
        $this->assertFalse($condition);
    }
    

    public function rankGapEqualsProvider()
    {
        $allRank = CardCode::allRank();
        $providers = [];
        for ($i=count($allRank)-1; $i >= 0; $i--) { 
            for ($j=$i-1; $j >= 0; $j--) {
                $rankCode1 = $allRank[$i];
                $rankCode2 = $allRank[$j]; 
                $providers[] = [$rankCode1, $rankCode2, $i - $j];
            }
        }

        return $providers;
    }
    
}
