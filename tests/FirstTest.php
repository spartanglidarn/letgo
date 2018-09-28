<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FirstTest extends TestCase
{
    public function testPhpunit(): void
    {
        $test = new Acme\First;
        $this->assert($test->phpunit());
    }
}