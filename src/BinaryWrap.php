<?php

namespace Treffynnon\BinaryWrap;

use Treffynnon\CmdWrap\Builder;

class BinaryWrap extends BinaryWrapAbstract
{
    protected $binary = 'date';

    public function __construct()
    {
        $this->addCommand('date', function () {
            return new \Treffynnon\BinaryWrap\Command;
        });
    }
}
