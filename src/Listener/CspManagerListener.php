<?php
/**
 * Created by PhpStorm.
 * User: CSING
 * Date: 23/04/2018
 * Time: 09:11 AM
 */

namespace CspManager\Listener;

use CspManager\Service\CspService;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class CspManagerListener extends AbstractListenerAggregate
{
    /**
     * @var CspService
     */
    protected $cspService;

    public function __construct($cspService)
    {
        $this->cspService = $cspService;
    }

    /**
     * Attach one or more listeners
     *
     * Implementors may add an optional $priority argument; the EventManager
     * implementation will pass this to the aggregate.
     *
     * @param EventManagerInterface $events
     * @param int $priority
     * @return void
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->cspService->generateToken();

        $this->listeners[] = $events->getSharedManager()->attach(AbstractActionController::class, 'dispatch', [$this, 'onCspDispatch'], 100);

    }

    public function onCspDispatch(MvcEvent $event)
    {

        $cspHeaders = $this->cspService->getCspHeaders();
        $head = $event->getResponse()->getHeaders()->addHeaders(['Content-Security-Policy' => $cspHeaders]);
        $controller = $event->getTarget();
        $controller->layout()->cspNonce = $this->cspService->getToken();

    }


}