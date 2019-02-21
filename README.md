## Running application

Clone the repository

    git clone https://github.com/lawrencehayford/Longest-Chain.git

Switch to the repo folder

    cd Longest-Chain

Install composer dependencies

    composer install

## How to use the chain class to find the starting number, under one million which produces the longest chain?

```php
        include 'src/Chain.php';
        $hop = new Hops(1000000);
        var_dump($hop->Process());

```

## Output

```php
        array (size=2)
        'number' => int 1161
        'Hops:' => int 181
```

## Chain Class

```php
        class Chain
        {
            /**
            * @var MaximumSteps
            */
            protected $maxStep = 0;

            /**
            * @var ArrayOfAllSteps
            */
            protected $all_steps = [];

            /**
            * Constructor sets the maximum step
            * @param $maxStep
            * @return void
            */
            public function __construct($maxStep)
            {
                $this->maxStep = $maxStep;
            }

            /**
            * This function returns the number of steps
            * @param $start
            * @param $step
            * @return int
            */
            public function HopSequence($start, $step = 0)
            {
                while ($start != 1) {
                    if ($start % 2 == 0) { //it is even
                        $start = $start / 2;
                    } else { // it is odd
                        $start = 3 * $start + 1;
                    }

                    $step++;
                }
                return $step;
            }

            /**
            * This function processes
            * @return array
            */
            public function Process()
            {
                for ($i = $this->maxStep; $i > 1; $i--) {
                    $this->all_steps[$i] = $this->HopSequence($i);
                }
                //getting the Maximum hops
                $max = array_keys($this->all_steps, max($this->all_steps));
                return ['number' => $max[0], 'Hops:' => $this->all_steps[$max[0]]];

            }

        }
```

## Running Test

    php vendor/phpunit/phpunit/phpunit

## Test Cases

```php

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

```
