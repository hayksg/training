<?php

namespace Application\Service;

use Zend\Log\Writer\Stream;
use Zend\Log\Logger;

class LoggerService
{
    public function __invoke(string $errorMessage)
    {
        $pathToLogFile = getcwd() . '/data/log/log.txt';

        $writer = new Stream($pathToLogFile);
        $logger = new Logger();
        $logger->addWriter($writer);
        $logger->debug($errorMessage);
    }
}
