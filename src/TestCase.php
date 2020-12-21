<?php
declare(strict_types=1);

namespace Meraki\TestSuite;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Exception;
use Closure;

/**
 * Base class that Meraki libraries implement when testing.
 *
 * @author Nathan Bishop <nbish11@hotmail.com> (https://nathanbishop.name)
 * @copyright 2019 Nathan Bishop
 * @license The MIT license.
 */
abstract class TestCase extends PHPUnitTestCase
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

    /**
     * Verify that an iterator has the correct values
     *
     * @param array $expected The expected iterator items in the order they should appear
     * @param iterable $actual The iterable object that is being tested
     */
    public function assertIteratorValues(array $expected, iterable $actual): void
    {
        $actual = is_array($actual) ? $actual : iterator_to_array($actual);

        $this->assertSame($expected, $actual);
    }
}
