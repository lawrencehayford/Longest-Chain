## Running application

Clone the repository

    git clone https://github.com/lawrencehayford/Longest-Chain.git

Switch to the repo folder

    cd Longest-Chain

## How to use the chain class to find the starting number, under one million which produces the longest chain?

        include 'src/Chain.php';
        $hop = new Hops(1000000);
        var_dump($hop->Process());

## Output

        array (size=2)
        'number' => int 1161
        'Hops:' => int 181

## Running Test

    php vendor/phpunit/phpunit/phpunit

## Test Cases writted

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
