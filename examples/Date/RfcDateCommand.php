<?php

namespace Treffynnon\BinaryWrap\Examples\Date;

class RfcDateCommand extends \Treffynnon\BinaryWrap\CommandAbstract
{
    public function command($c)
    {
        return $c->addCommand('date')
          ->addEnvVar('LC_TIME', 'C')
          ->addParameter('+%a, %d %b %Y %T %z');
    }

    public function parseOutput($output)
    {
        return rtrim($output);
    }
}
