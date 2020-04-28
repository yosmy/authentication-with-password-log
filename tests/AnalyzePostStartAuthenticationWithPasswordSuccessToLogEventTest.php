<?php

namespace Yosmy\Test;

use PHPUnit\Framework\TestCase;
use Yosmy;

class AnalyzePostStartAuthenticationWithPasswordSuccessToLogEventTest extends TestCase
{
    public function testAnalyze()
    {
        $device = 'device';
        $country = 'country';
        $prefix = 'prefix';
        $number = 'number';

        $logEvent = $this->createMock(Yosmy\LogEvent::class);

        $logEvent->expects($this->once())
            ->method('log')
            ->with(
                [
                    'yosmy.start_authentication_with_password_success',
                    'success'
                ],
                [
                    'device' => $device,
                    'country' => $country,
                    'prefix' => $prefix,
                    'number' => $number,
                ],
                []
            );

        $analyzePostStartAuthenticationWithPasswordSuccessToLogEvent = new Yosmy\AnalyzePostStartAuthenticationWithPasswordSuccessToLogEvent(
            $logEvent
        );

        $analyzePostStartAuthenticationWithPasswordSuccessToLogEvent->analyze(
            $device,
            $country,
            $prefix,
            $number
        );
    }
}