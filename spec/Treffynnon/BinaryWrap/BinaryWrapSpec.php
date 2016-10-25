<?php

namespace spec\Treffynnon\BinaryWrap;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BinaryWrapSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Treffynnon\BinaryWrap\BinaryWrap');
    }

    function it_can_set_and_get_queue_id_key()
    {
        $this->date()->shouldReturn('HELO');
    }
}
