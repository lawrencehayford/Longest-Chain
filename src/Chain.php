<?php
class Chain
{
    /**
     * @var MaximumSteps
     */
    protected $maxStep = 2000;

    /**
     * @var ArrayOfAllSteps
     */
    protected $all_steps = [];

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
