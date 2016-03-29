<?php

namespace Src;

class CombinationGenerator {

    private $lengths;
    private $count;

    public function __construct($lengths)
    {
        $this->lengths = $lengths;
    }

    public function count($length, $split_limit)
    {
        $this->branch($split_limit, [], $length);
        return $this->count;
    }

    private function branch($split_limit, $elements, $left_amount)
    {
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
            $this->branch($split_limit, $reefs, $left_amount - $i);
        }
    }

}
