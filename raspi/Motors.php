<?php

require 'wiringpi.php';

/**
 * Class to manage local camera
 *
 * @author spozoga
 */
class Motors {

    const RIGT_PIN = 8;
    const LEFT_PIN = 11;
    const PIN_OUTPUT = 1;
    const TIME = 2;
    
    function left() {
        set_time_limit(self::TIME+2);
        wiringpi::pinMode(self::RIGT_PIN, self::PIN_OUTPUT);
        wiringpi::digitalWrite(self::RIGT_PIN, 1);
        sleep(self::TIME);
        wiringpi::digitalWrite(self::RIGT_PIN, 0);
        sleep(self::TIME);
    }
    
    function right() {
        set_time_limit(self::TIME+2);
        wiringpi::pinMode(self::LEFT_PIN, self::PIN_OUTPUT);
        wiringpi::digitalWrite(self::LEFT_PIN, 1);
        sleep(self::TIME);
        wiringpi::digitalWrite(self::LEFT_PIN, 0);
        sleep(self::TIME);
    }
    
    function ahead() {
        set_time_limit(self::TIME+2);
        wiringpi::pinMode(self::RIGT_PIN, self::PIN_OUTPUT);
        wiringpi::digitalWrite(self::RIGT_PIN, 1);
        wiringpi::pinMode(self::LEFT_PIN, self::PIN_OUTPUT);
        wiringpi::digitalWrite(self::LEFT_PIN, 1);
        sleep(self::TIME);
        wiringpi::digitalWrite(self::RIGT_PIN, 0);
        wiringpi::digitalWrite(self::LEFT_PIN, 0);
        sleep(self::TIME);
    }

}
