<?php
/**
 * Created by PhpStorm.
 * User: CSING
 * Date: 23/04/2018
 * Time: 09:17 AM
 */

namespace CspManager;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use CspManager\Listener\CspManagerListener;

class Module implements BootstrapListenerInterface, ConfigProviderInterface
{

    /**
     * Listen to the bootstrap event
     *
     * @param EventInterface $e
     * @return array
     */
    public function onBootstrap(EventInterface $e)
    {
        // TODO: Implement onBootstrap() method.
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