<?php
/**
 * Created by PhpStorm.
 * User: CSING
 * Date: 23/04/2018
 * Time: 09:37 PM
 */

namespace CspManager\Service;


use CspManager\Options\CspOptions;

/**
 * Class CspService
 * @package CspManager\Service
 */
class CspService
{

    /**
     * @var CspOptions
     */
    protected $options;

    /**
     * @var string
     */
    protected $cspToken;

    /**
     * CspService constructor.
     * @param CspOptions $options
     */
    public function __construct($options)
    {
        $this->options = $options;
    }

    /**
     *
     */
    public function generateToken()
    {
        $this->cspToken = sha1(date('dmYhisu'));
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->cspToken;
    }

    /**
     * @return string
     */
    public function getCspHeaders()
    {

        $cspHeaders = implode('', $this->options->getHeaders());
        $cspDirectives = $this->options->getDirectives();

        $cspHeadersFinal = sprintf($cspHeaders, $this->cspToken, $cspDirectives['report_uri']);
        return $cspHeadersFinal;
    }
}