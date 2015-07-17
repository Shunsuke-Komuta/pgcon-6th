<?php
while (true) {
    $length = trim(fgets(STDIN));
    $number = trim(fgets(STDIN));

    $lengths = [];
    for ($i = 0; $i < $number; $i++) {
        $lengths[] = trim(fgets(STDIN));
    }
    $combination = new CombinationGenerator($length, $lengths);
    echo $combination->count(3);
    return;
}

class CombinationGenerator {

    private $length;
    private $lengths;
    private $count;

    public function __construct($length, $lengths)
    {
        $this->length = $length;
        $this->lengths = $lengths;
    }

    public function count($split_limit)
    {
        for ($i = 1; $i < ($this->length / $split_limit); $i++) {
            if (!in_array($i, $this->lengths)) {
                continue;
            }
            $elements = [];
            $elements[] = $i;
            $this->branch($split_limit, $elements, $i);
        }
        return $this->count;
    }

    private function branch($split_limit, $elements, $sum)
    {
        $left_amount = $this->length - $sum;

        $last_split_limit = $split_limit - count($elements);
        if ($last_split_limit == 1) {
            if (in_array($left_amount, $this->lengths)) {
                $this->count++;
            }
            return;
        }

        for ($i = end($elements) + 1; $i <= ($left_amount / $last_split_limit); $i++) {
            if (!in_array($i, $this->lengths)) {
                continue;
            }
            $reefs = $elements;
            $reefs[] = $i;
            $this->branch($split_limit, $reefs, $sum + $i);
        }
    }

}
