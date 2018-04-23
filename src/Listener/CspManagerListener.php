<?php
/**
 * Created by PhpStorm.
 * User: CSING
 * Date: 23/04/2018
 * Time: 09:11 AM
 */

namespace CspManager\Listener;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;

class CspManagerListener extends AbstractListenerAggregate
{

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
        // TODO: Implement attach() method.

    }
}