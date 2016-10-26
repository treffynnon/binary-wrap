<?php

namespace Treffynnon\BinaryWrap;

class BinaryWrapAbstract implements BinaryWrapInterface
{
    protected static $singleton;
    protected $commandBuilder;
    protected $responseClass;

    public function __construct(BuilderInterface $builder = null, ResponseInterface $response = null)
    {
        $this->setCommandBuilder($builder);
        $this->setResponseClass($response);
        $this->registerCommands();
    }

    public function setCommandBuilder(BuilderInterface $builder = null)
    {
        $this->commandBuilder = $builder;
        if (null === $this->commandBuilder) {
            $this->commandBuilder = new Builder;
        }
    }

    public function getCommandBuilder()
    {
        return clone $this->commandBuilder;
    }

    public function setResponseClass(ResponseInterface $response = null)
    {
        $this->responseClass = $response;
        if (null === $this->responseClass) {
            $this->responseClass = new Response;
        }
    }

    public function getResponseClass()
    {
        return clone $this->responseClass;
    }

    public static function __callStatic($method, $arguments)
    {
        if (null === static::$singleton) {
            static::$singleton = new static;
        }
        return static::$singleton->$method(...$arguments);
    }

    public function __call($method, $arguments)
    {
        $command = $this->getCommand($method);
        return $command($this->getCommandBuilder(), $this->getResponseClass(), $arguments);
    }

    public function addCommand($name, callable $command)
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
