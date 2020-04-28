<?php
namespace App\Services\Logs;

use Monolog\Logger;

class LambdaMonolog {

    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return Logger
     */
    public function __invoke(array $config)
    {
        $logger = new Logger('custom');
        $logger->pushHandler(new LambdaHandler());
        return $logger;
    }

}