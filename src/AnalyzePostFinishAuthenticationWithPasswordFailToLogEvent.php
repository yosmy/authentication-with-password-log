<?php

namespace Yosmy;

use JsonSerializable;

/**
 * @di\service({
 *     tags: [
 *         'yosmy.post_finish_authentication_with_password_fail',
 *     ]
 * })
 */
class AnalyzePostFinishAuthenticationWithPasswordFailToLogEvent implements AnalyzePostFinishAuthenticationWithPasswordFail
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
        string $password,
        JsonSerializable $e
    ) {
        $this->logEvent->log(
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
    }
}
