<?php
declare(strict_types=1);

namespace Meraki;

use PHPUnit\Framework\TestCase;
use Exception;
use Closure;

/**
 * Base class that Meraki libraries implement when testing.
 *
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2019 Nathan Bishop
 * @license The MIT license.
 */
abstract class TestSuite extends TestCase
{
    /**
     * A better way for testing exceptions when using the 'arrange, act and assert' methodology.
     *
     * @param Exception $expectedException The exception object that should be thrown.
     * @param Closure $callbackThatWillThrow The method or function, within a closure, that should raise the exception.
     */
    public function assertThrows(Exception $expectedException, Closure $callbackThatWillThrow): void
    {
        $this->expectExceptionObject($expectedException);

        $callbackThatWillThrow();
    }
}
