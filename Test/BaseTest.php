<?php
/*
 * Copyright 2016 MasterCard International.
 *
 * Redistribution and use in source and binary forms, with or without modification, are 
 * permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of 
 * conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * Neither the name of the MasterCard International Incorporated nor the names of its 
 * contributors may be used to endorse or promote products derived from this software 
 * without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES 
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT 
 * SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
 * TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; 
 * OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER 
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING 
 * IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF 
 * SUCH DAMAGE.
 *
 */

namespace Test;

use MasterCard\Core\Model\RequestMap;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


abstract class BaseTest extends \PHPUnit_Framework_TestCase {

    protected static $logger = null;
    public static $responses = array();


    protected function setUp() {
        self::$logger = new Logger('BaseTest');
    }

    /**
     *
     * @param type $name
     * @param type $response
     */
    public static function putResponse($name, $response) {
        self::$responses[$name] = $response;
    }

    /**
     *
     * @param type $overrideValue
     * @return type
     */
    public static function resolveResponseValue($overrideValue) {


        $pos = strpos($overrideValue, ".");

        $name = substr($overrideValue, 0, $pos);
        $key = substr($overrideValue, $pos+1);

        if (array_key_exists($name, BaseTest::$responses)) {
            $response = BaseTest::$responses[$name];
            if ($response->containsKey($key)) {
                return $response->get($key);
            } else {
                 self::$logger->addError("Key:'$key' is not found in the response");
            }
        }  else {
             self::$logger->addError("Example:'$name' is not found in the responses");
        }

        return null;
    }


    protected function customAssertValue($expected, $actual) {
        if (is_bool($actual)) {
            $this->assertEquals(boolval($expected), $actual);
        } else if (is_int($actual)) {
            $this->assertEquals(intval($expected), $actual);
        } else if (is_float($actual)) {
            $this->assertEquals(floatval($expected), $actual);
        } else {
            $this->assertEquals(strtolower($expected), strtolower($actual));
        }
    }



}

