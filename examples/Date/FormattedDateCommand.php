<?php

namespace Treffynnon\BinaryWrap\Examples\Date;

class FormattedDateCommand extends \Treffynnon\BinaryWrap\CommandAbstract
{
    public function command($c, $format)
    {
        return $c->addCommand('date')
          ->addParameter('+' . $format);
    }

    public function parseOutput($output)
    {
        return rtrim($output);
    }
}
