<?php
/**
 * Created by PhpStorm.
 * User: CSING
 * Date: 23/04/2018
 * Time: 09:38 AM
 */

namespace CspManager\Options;

use Zend\Stdlib\AbstractOptions;

class CspOptions extends AbstractOptions
{

    protected $headers;

    protected $directives;

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param mixed $headers
     * @return CspOptions
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDirectives()
    {
        return $this->directives;
    }

    /**
     * @param mixed $directives
     * @return CspOptions
     */
    public function setDirectives($directives)
    {
        $this->directives = $directives;
        return $this;
    }


}