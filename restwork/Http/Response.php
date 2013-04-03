<?php
namespace RESTWork\Http;

use RESTWork\SingletonTrait;

class Response
{
    use SingletonTrait;

    /**
     * This will hold all the content assigned from the dispatcher which
     * retrieves its data from a controller
     *
     * @var string $body
     * @access public
     */
    public $body;

    /**
     * This will hold a status
     *
     * @var ResponseStatus $statusCode
     * @access public
     */
    public $responseStatus;

    /**
     * This is an array with possible header statuses.
     *
     * @var array $response
     * @access protected
     */
    protected $response = array(
        100 => 'Continue',
        101 => 'Switching Protocol',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choice',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'unused',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized ',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        415 => 'Unsupported Media',
        416 => 'Requested Range',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
    );

    public static function create($body, $httpStatusCode, array $header = [])
    {
        //Rework
    }

    public function __construct()
    {
        $this->setStatus(200);
    }

    /**
     * This method is used to set the content ready for output
     *
     * @param mixed $content
     * @return Response
     */
    public function setBody($content)
    {
        $this->body = $content;

        return $this;
    }

    /**
     * This function will attempt to set a status for the header information it
     * is possible to choose from the predefined array.
     *
     * @param $httpStatusCode
     * @param null $httpStatusMessage
     * @throws \InvalidArgumentException
     * @access public
     * @return Response
     */
    public function setStatus($httpStatusCode, $httpStatusMessage = null)
    {
        if(array_key_exists($httpStatusCode, $this->response)) {
            $httpStatusMessage = $this->response[$httpStatusCode];
        }
        else if($httpStatusMessage === null) {
            throw new \InvalidArgumentException(sprintf('Code not found, please define a description for [%s]', $httpStatusCode));
        }

        $this->responseStatus = new ResponseStatus($httpStatusCode, $httpStatusMessage);

        return $this;
    }

    /**
     * This will essentially use the status code and message to output header
     * information and echo the content.
     *
     * @access public
     * @return void
     */
    public function outputStatus()
    {
        if($this->responseStatus instanceof ResponseStatus) {
            header(sprintf('HTTP/1.1 %d %s', $this->responseStatus->httpStatusCode, $this->responseStatus->httpStatusMessage));
        }
        echo $this->body;
    }
}