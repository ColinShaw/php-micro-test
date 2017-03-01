<?php

    class MicroTest {

        private static $total  = 0,
                       $passed = 0;

        public static function start() {
            error_reporting(E_ALL);
            echo "\n\033[35mBeginning tests:\033[0m\n";
        }

        public static function finish() {
            $passed = self::$passed;
            $total = self::$total;
            echo "\033[35mPassed {$passed}/{$total} tests.\033[0m\n\n";
        }

        private static function test_passed() {
            self::$total++;
            self::$passed++;
            return "\033[32mPass";
        }

        private static function test_failed() {
            self::$total++;
            return "\033[31mFail";
        }

        private static function print_result($name, $result) {
            echo " \033[33mTesting {$name}: {$result}\033[0m\n";
        }

        public static function test_equal($name, $actual, $expected) {
            $result = ($actual == $expected) ? self::test_passed() : self::test_failed();
            self::print_result($name, $result);
        }

    }
