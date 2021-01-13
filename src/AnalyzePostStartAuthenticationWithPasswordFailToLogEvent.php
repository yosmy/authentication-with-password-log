<?php

namespace Yosmy;

use JsonSerializable;

/**
 * @di\service({
 *     tags: [
 *         'yosmy.post_start_authentication_with_password_fail',
 *     ]
 * })
 */
class AnalyzePostStartAuthenticationWithPasswordFailToLogEvent implements AnalyzePostStartAuthenticationWithPasswordFail
{
    /**
     * @var LogEvent
     */
    private $logEvent;

    /**
     * @param LogEvent $logEvent
     */
    public function __construct(
        LogEvent $logEvent
    ) {
        $this->logEvent = $logEvent;
    }

    /**
     * {@inheritDoc}
     */
    public function analyze(
        string $device,
        string $country,
        string $prefix,
        string $number,
        JsonSerializable $e
    ) {
        $this->logEvent->log(
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
    }
}
