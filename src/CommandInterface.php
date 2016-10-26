<?php

namespace Treffynnon\BinaryWrap;

interface CommandInterface
{
    public function __invoke(BuilderInterface $builder, ResponseInterface $response, $arguments);
    public function parseOutput($output);
    public function parseError($error);
}
