<?php
/**
 * User: Carlos Sing Ramos
 * Date: 23/04/2018
 * Time: 09:17 PM
 */

namespace CspManager;

use CspManager\Options\CspOptions;
use CspManager\Service\CspService;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use CspManager\Listener\CspManagerListener;
use Zend\Loader\StandardAutoloader;
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

//        var_dump($serviceManager->get(CspOptions::class));
//        var_dump($serviceManager->get(CspService::class));
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
//        var_dump(file_get_contents(__DIR__ . '/../config/module.config.php'));
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Return an array for passing to Zend\Loader\AutoloaderFactory.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
//            'Zend\Loader\ClassMapAutoloader' => array(
//                __DIR__ . '/autoload_classmap.php'
//            ),
            StandardAutoloader::class => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/',
                ),
            ),
        );
    }

}