<?php

include_once __DIR__ . '/../functions.php';
include_once __DIR__ . '/../strings.php';
include_once __DIR__ . '/../config.php';

use PHPUnit\Framework\TestCase;

final class FunctionsTest extends TestCase
{
    public function testGetValidationErrorsWorksProperly(): void
    {
        global $strings;

        // When I give array key strings where a middle key's value isn't an array - return null
        $this->assertNull(get_validation_error('tests.foo2.fizz'));

        // When I give an empty key - return empty string
        $this->assertEmpty(get_validation_error(''));

        // When I give wrong key - return empty
        $this->assertEmpty(get_validation_error('wrongkey'));

        // Return value quickly if I only give one key
        $expected_value = $strings['errors']['test_single'];
        $single_value = get_validation_error('test_single');
        $this->assertIsString($single_value);
        $this->assertEquals($expected_value, $single_value);
        // Return null quickly if I only give one wrong key
        $this->assertNull(get_validation_error('nonexistant'));

        // When I give all correct - return correct value
        $expected_values = [
            'test_single' => $strings['errors']['test_single'],
            'tests.foo1.bar1' => $strings['errors']['tests']['foo1']['bar1'],
            'tests.foo2' => $strings['errors']['tests']['foo2'],
            'tests.foo3.bar3.baz3' => $strings['errors']['tests']['foo3']['bar3']['baz3'],
        ];
        foreach ($expected_values as $key => $expected) {
            $actual = get_validation_error($key);
            $this->assertIsString($actual);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testPasswordMatchingWorks(): void
    {
        global $config;

        $this->assertEquals($config['test_user']['password'], hash($config['hash_algo'], 'secret'));
    }
}