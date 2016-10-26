<?php

namespace Treffynnon\BinaryWrap;

use Treffynnon\CmdWrap\Runners\SymfonyProcess;

abstract class CommandAbstract implements CommandInterface
{
    public function __invoke(BuilderInterface $builder, ResponseInterface $response, $arguments)
    {
        $command = $this->command($builder, ...$arguments);
        /// run it
        $sp = new SymfonyProcess();
        $lineParser = null;
        if (method_exists($this, 'parseLine')) {
            $lineParser = function ($line) {
                return $this->parseLine($line);
            };
        }
        $r = $sp->run($command, $lineParser);
        return $response->set(
            $r->getCommand(),
            $r->getStatus(),
            $this->parseOutput($r->getOutput()),
            $this->parseError($r->getError())
        );
    }

    public function parseOutput($output)
    {
        return $output;
    }

    public function parseError($error)
    {
        return $error;
    }
}
