<?php

namespace Treffynnon\BinaryWrap;

class Command extends CommandAbstract
{
    public function command($c)
    {
        $c->addCommand('date')
          ->addFlag('j');
        return $c;
    }

    public function parseLine($line)
    {
        return $line;
    }

    public function parse($output)
    {
        return trim($output);
    }

    public function parseError($output)
    {
        return $output;
    }
}
