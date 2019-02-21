<?php

use PHPUnit\Framework\TestCase;

include 'src/Chain.php';

class LongestChainTest extends TestCase
{

    /**
     * @var MaximumSteps
     */
    protected $maxStep = 1000;

    /**
     * @var Chain
     */
    protected $hops;

    public function setUp()
    {
        parent::setUp();
        $this->hops = new Chain($this->maxStep);
    }

    public function tearDown()
    {
        parent::tearDown();
        unset($this->hops);
        unset($this->maxStep);
    }

    /**
     * @return array
     */
    public function testProcess()
    {
        $returnedArray = $this->hops->Process();
        $this->assertInternalType('array', $returnedArray);
        return $returnedArray;
    }

    public function testHopSequence()
    {
        $sequence = $this->hops->HopSequence(2);
        $this->assertEquals($sequence, 1);
        return $sequence;
    }

}
