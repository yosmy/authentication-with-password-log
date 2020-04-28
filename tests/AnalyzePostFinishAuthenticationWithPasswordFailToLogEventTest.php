<?php

namespace Yosmy\Test;

use PHPUnit\Framework\TestCase;
use Yosmy;

class AnalyzePostFinishAuthenticationWithPasswordFailToLogEventTest extends TestCase
{
    public function testAnalyze()
    {
        $device = 'device';
        $country = 'country';
        $prefix = 'prefix';
        $number = 'number';
        $password = 'password';
        $e = new Exception();

        $logEvent = $this->createMock(Yosmy\LogEvent::class);

        $logEvent->expects($this->once())
            ->method('log')
            ->with(
                [
                    'yosmy.finish_authentication_with_password_fail',
                    'fail'
                ],
                [
                    'device' => $device,
                    'country' => $country,
                    'prefix' => $prefix,
                    'number' => $number,
                ],
                [
                    'password' => $password,
                    'exception' => $e->jsonSerialize()
                ]
            );

        $analyzePostFinishAuthenticationWithPasswordFailToLogEvent = new Yosmy\AnalyzePostFinishAuthenticationWithPasswordFailToLogEvent(
            $logEvent
        );

        $analyzePostFinishAuthenticationWithPasswordFailToLogEvent->analyze(
            $device,
            $country,
            $prefix,
            $number,
            $password,
            $e
        );
    }
}