<?php
while (true) {
    $length = trim(fgets(STDIN));
    $number = trim(fgets(STDIN));

    $lengths = [];
    for ($i = 0; $i < $number; $i++) {
        $lengths[] = trim(fgets(STDIN));
    }
    $combination = new CombinationGenerator($length, $lengths);
    echo $combination->count(2);
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
        for ($i = 1; $i < $this->length; $i++) {
            $elements = [];
            $elements[] = $i;
            $this->branch($split_limit, $elements);
        }
        return $this->count;
    }

    private function branch($split_limit, $elements)
    {
        $split_limit--;
        for ($i = end($elements); $i < $this->length; $i++) {
            $reefs = $elements;
            $result = $this->length - array_sum($reefs);
            if ($i >= $result) {
                break;
            }

            if ($split_limit == 0) {
                $reefs[] = $result;
                if ($this->contains_all($reefs)) {
                    $this->count++;
                }
                return;
            } else {
                $reefs[] = $i + 1;
                $this->branch($split_limit, $reefs);
            }
        }
    }

    private function contains_all($reefs)
    {
        foreach ($reefs as $reef) {
            if (!in_array($reef, $this->lengths)) {
                return false;
            }
        }
        return true;
    }
}

?>
