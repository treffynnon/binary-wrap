<?php

namespace Treffynnon\BinaryWrap;

abstract class BinaryWrapAbstract
{
    protected $config = [];

    public function __construct($config = [])
    {
        $this->setConfig($config);
    }

    public function __call($method, $arguments)
    {
        $command = $this->getCommand($method);
        return $command($arguments);
    }

    public function addCommand($name, $command)
    {
        $this->config[$name] = $command;
    }

    public function getCommand($name)
    {
        if (array_key_exists($name, $this->config)) {
            return $this->config[$name]();
        }
    }
}
