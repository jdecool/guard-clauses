<?php

declare(strict_types=1);

namespace JDecool\GuardClauses;

use Error;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class GuardTest extends TestCase
{
    #[Test]
    public function errorExceptionThrowsWhenCallingNonExistentMethod(): void
    {
        $this->expectException(Error::class);

        Guard::foo();
    }

    #[Test]
    public function guardClausesExceptionThrowsWhenCheckingInvalidArgument(): void
    {
        $this->expectException(GuardClausesException::class);

        Guard::integer('foo');
    }

    #[Test]
    public function valueReturnIfGuardClausesPass(): void
    {
        static::assertSame(42, Guard::integer(42));
    }
}
