<?php

namespace Treffynnon\BinaryWrap;

interface BinaryWrapInterface
{
    public function __construct();
    public function __call($method, $arguments);
    public static function __callStatic($method, $arguments);
    public function addCommand($name, callable $command);
    public function getCommand($name);
}
