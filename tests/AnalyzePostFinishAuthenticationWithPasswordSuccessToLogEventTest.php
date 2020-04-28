<?php

namespace Yosmy\Test;

use PHPUnit\Framework\TestCase;
use Yosmy;

class AnalyzePostFinishAuthenticationWithPasswordSuccessToLogEventTest extends TestCase
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
                    'yosmy.finish_authentication_with_password_success',
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

        $analyzePostFinishAuthenticationWithPasswordSuccessToLogEvent = new Yosmy\AnalyzePostFinishAuthenticationWithPasswordSuccessToLogEvent(
            $logEvent
        );

        $analyzePostFinishAuthenticationWithPasswordSuccessToLogEvent->analyze(
            $device,
            $country,
            $prefix,
            $number
        );
    }
}