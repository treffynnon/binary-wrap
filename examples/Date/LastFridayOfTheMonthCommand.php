<?php

namespace Treffynnon\BinaryWrap\Examples\Date;

class LastFridayOfTheMonthCommand extends \Treffynnon\BinaryWrap\CommandAbstract
{
    public function command($c)
    {
        return $c->addCommand('date')
          ->addFlag('v1d')
          ->addFlag('v+1m')
          ->addFlag('v-1d')
          ->addFlag('v-fri')
          ->addParameter('+%d %m %Y');
    }

    public function parseOutput($output)
    {
        $d = explode(' ', rtrim($output));
        return (object) [
            'day' => $d[0],
            'month' => $d[1],
            'year' => substr($d[2], 2)
        ];
    }
}
