<?php

namespace spec\Src;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CombinationGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Src\CombinationGenerator');
    }
}
