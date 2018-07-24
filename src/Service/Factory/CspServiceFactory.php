<?php
/**
 */

namespace CspManager\Service\Factory;

use CspManager\Options\CspOptions;
use CspManager\Service\CspService;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
//use Zend\ServiceManager\Factory\FactoryInterface;
use CspManager\Listener\CspManagerListener;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CspServiceFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $cspManagerOptions = $container->get(CspOptions::class);
        $cspManagerService = new CspService($cspManagerOptions);
        return $cspManagerService;
    }

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $cspManagerOptions = $serviceLocator->get(CspOptions::class);
        $cspManagerService = new CspService($cspManagerOptions);
        return $cspManagerService;
    }
}