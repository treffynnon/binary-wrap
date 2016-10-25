<?php

namespace Treffynnon\BinaryWrap;

use Treffynnon\CmdWrap\Runners\SymfonyProcess;

class CommandAbstract
{
    public function __invoke($args)
    {
        $command = $this->command(new \Treffynnon\CmdWrap\Builder, ...$args);
        /// run it
        $sp = new SymfonyProcess();
        $lineParser = null;
        if (method_exists($this, 'parseLine')) {
            $lineParser = function ($line) {
                return $this->parseLine($line);
            };
        }
        $r = $sp->run($command, $lineParser);
        return $this->parse($r->getOutput());
    }
}
