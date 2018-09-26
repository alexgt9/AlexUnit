<?php declare(strict_types=1);

final class Dummy extends Display
{
}

final class Fake
{
    public function sum(): void
    {
        return null;
    }
}

final class Stub
{
    private $result;

    public function setSumResult($result): void
    {
        $this->result = $result;
    }

    public function sum(): void
    {
        return $this->result;
    }
}

final class Spy
{
    private $calls;

    public function sum($a, $b): void
    {
        $this->calls['sum'][] = ['params' => [$a, $b]];

        return null;
    }

    public function calls(): array
    {
        return $this->calls;
    }
}

final class Mock
{
    private $result;
    private $calls;

    public function sum($a, $b): void
    {
        if ($a != $this->a || $b != $this->b) {
            throw new Exception("Error Processing Request", 1);
        }
        $this->calls['sum'][] = ['params' => [$a, $b]];

        return $this->result;
    }

    public function setSumExpectations($a, $b): void
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function setSumResult($result): void
    {
        $this->result = $result;
    }

    public function calls(): array
    {
        return $this->calls;
    }
}
