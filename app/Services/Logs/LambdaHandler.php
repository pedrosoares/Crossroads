<?php
namespace App\Services\Logs;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

class LambdaHandler extends AbstractProcessingHandler {

    public function __construct($level = Logger::DEBUG) {
        parent::__construct($level);
    }

    /**
     * Print the Error to the CloudWatch Logs
     * @param array $record
     */
    protected function write(array $record) {
        error_log(print_r($record, true));
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter(){
        return new LogFormatter();
    }
}