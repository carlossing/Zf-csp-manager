<?php
/**
 * User: Carlos Sing Ramos
 * Date: 23/04/2018
 * Time: 09:17 PM
 */

namespace CspManager;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use CspManager\Listener\CspManagerListener;

/**
 * @licence MIT
 * @author  Carlos Sing Ramos <carlossing@gmail.com>
 */

class Module implements BootstrapListenerInterface, ConfigProviderInterface
{

    /**
     * Listen to the bootstrap event
     *
     * @param EventInterface $event
     * @return array
     */
    public function onBootstrap(EventInterface $event)
    {
        /* @var $application \Zend\Mvc\Application */
        $application     = $event->getTarget();
        $serviceManager  = $application->getServiceManager();
        $eventManager    = $application->getEventManager();

        /** @var CspManagerListener $listener */
        $listener = $serviceManager->get(CspManagerListener::class);
        $listener->attach($eventManager);
    }

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}