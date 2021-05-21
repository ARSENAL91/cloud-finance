<?php


namespace Wwjpackages\CloudFinance\Exception;

use Psr\Http\Message\ResponseInterface;


class RequestFailException extends RuntimeException
{

    /**
     * @var ResponseInterface;
     */
    protected $response;

    public function __construct($response, $message = "", $code = 0, $previous = null)
    {
        $this->response = $response;
        parent::__construct($message, $code, $previous);
    }

    public function getResponse()
    {
        return $this->response;
    }
}