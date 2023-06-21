<?php

namespace App\Services\Internal;

class Base
{
    protected string $name;

    protected string $description;

    protected function name(): string
    {
        return $this->name;
    }

    protected function description(): string
    {
        return $this->description;
    }
}
