<?php

namespace Yosmy\Test;

use PHPUnit\Framework\TestCase;
use Yosmy;

class AnalyzePostStartAuthenticationWithPasswordFailToLogEventTest extends TestCase
{
    public function testAnalyze()
    {
        $device = 'device';
        $country = 'country';
        $prefix = 'prefix';
        $number = 'number';
        $e = new Exception();

        $logEvent = $this->createMock(Yosmy\LogEvent::class);

        $logEvent->expects($this->once())
            ->method('log')
            ->with(
                [
                    'yosmy.start_authentication_with_password_fail',
                    'fail'
                ],
                [
                    'device' => $device,
                    'country' => $country,
                    'prefix' => $prefix,
                    'number' => $number,
                ],
                [
                    'exception' => $e->jsonSerialize()
                ]
            );

        $analyzePostStartAuthenticationWithPasswordFailToLogEvent = new Yosmy\AnalyzePostStartAuthenticationWithPasswordFailToLogEvent(
            $logEvent
        );

        $analyzePostStartAuthenticationWithPasswordFailToLogEvent->analyze(
            $device,
            $country,
            $prefix,
            $number,
            $e
        );
    }
}