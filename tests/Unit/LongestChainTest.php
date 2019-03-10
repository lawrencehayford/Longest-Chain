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

    /**
     * @var mockChain
     */
    protected $mockChain;

    public function setUp()
    {
        parent::setUp();
        $this->mockChain = \Mockery::mock(Chain::class);
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
        $this->mockChain
            ->shouldReceive('HopSequence')
            ->with($start = 1, $step = 1)
            ->once()
            ->andReturn(1);

        $this->mockChain
            ->shouldReceive('Process')
            ->once()
            ->andReturn(['number' => 1, 'Hops:' => 1]);

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
