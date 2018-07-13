<?php
/**
 */

namespace CspManager\Options\Factory;

use CspManager\Options\CspOptions;
use CspManager\Service\CspService;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use CspManager\Listener\CspManagerListener;

class CspOptionsFactory implements FactoryInterface
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
        /* @var $config array */
        $config = $container->has('config') ? $container->get('config') : [];
        $config = isset($config['csp-manager']) ? $config['csp-manager'] : [];
        return new CspOptions($config);
    }
}