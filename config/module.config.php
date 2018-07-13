<?php
/**
 * Created by PhpStorm.
 * User: CSING
 * Date: 23/04/2018
 * Time: 09:11 AM
 */

namespace CspManager;

use CspManager\Listener\CspManagerListener;

use CspManager\Listener\Factory\CspManagerListenerFactory;
use CspManager\Options\CspOptions;
use CspManager\Options\Factory\CspOptionsFactory;
use CspManager\Service\CspService;
use CspManager\Service\Factory\CspServiceFactory;

return [
    'service_manager' => [
        'factories' => [
            CspOptions::class => CspOptionsFactory::class,
            CspService::class => CspServiceFactory::class,
            CspManagerListener::class => CspManagerListenerFactory::class,
        ]
    ],
    'csp-manager' => [],

];