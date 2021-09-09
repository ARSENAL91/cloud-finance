<?php


namespace Wwjpackages\CloudFinance\Kernel;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Wwjpackages\CloudFinance\Exception\RequestFailException;
use Wwjpackages\CloudFinance\Exception\RuntimeException;

/**
 * 基础服务
 * Class BaseService
 *
 * @package Cloud\Finance\Kernel
 */
class BaseService
{

    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $compamyKey;

    /**
     * @var string
     */
    protected $companySecret;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected $options = [];

    public function __construct(array $config, Client $client)
    {
        $this->host = $config['host'];
        $this->compamyKey = $config['company_key'];
        $this->companySecret = $config['company_secret'];
        $this->httpClient = $client;
    }

    /**
     * 设置option
     * @param array $options
     */
    public function setAttemptOption(array $options)
    {
        $this->options = $options;
    }

    /**
     * 发起请求
     * @param string $method
     * @param string $uri
     * @param array $params
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function attempt($method, $uri, array $params = [])
    {
        foreach ($params as $k => $v) {
            if (is_null($v)) {
                $params[$k] = '';
            }
        }
        $method = strtoupper($method);
        $this->host = rtrim($this->host, "/");
        $url = $this->host . trim($uri, '?') . '?';
        $params = $this->signature($params);

        switch ($method) {
            case 'GET':
                $this->options['query'] = $params;
                break;
            case 'POST':
            case 'PUT':
            case 'DELETE':
                $this->options['form_params'] = $params;
                break;
        }
        try {
            $response = $this->httpClient->request($method, $url, $this->options);
            $content = $response->getBody()->getContents();
            $result = json_decode($content, true);
            if ($result === false) {
                throw new RequestFailException($response, '财务云系统请求失败!!');
            }
            return $result;
        } catch (BadResponseException $e) {
            $content = $e->getResponse()->getBody()->getContents();
            $result = json_decode($content, true);
            if ($result === false) {
                throw new RequestFailException($e->getResponse(), '财务云系统请求失败!!');
            }
            throw new RequestFailException($e->getResponse(), $result['message'] ?? '财务云系统请求失败!!', 0, $e);
        }

    }

    /**
     * 生成签名
     * @param array $params
     * @return array
     */
    protected function signature(array $params)
    {
        $params['nonce_str'] = $this->randomStr(15);
        $params['company_key'] = $this->compamyKey;
        $str = '';
        $this->paramsToStr($params, $str);
        $str .= 'company_secret=' . $this->companySecret;
        $signature = md5($str);
        $params['signature'] = $signature;
        return $params;
    }

    /**
     * 将参数生成验证字符串
     * @param $params
     * @param $str
     */
    protected function paramsToStr($params, &$str)
    {
        if (!ksort($params)) {
            throw new RuntimeException('生成签名失败！！！');
        }
        foreach ($params as $k => $v) {
            if (is_array($v)) {
                $this->paramsToStr($v, $str);
            } else {
                $str .= $k . '=' . $v . '&';
            }
        }
    }

    /**
     * 随机字符串
     * @param $len
     * @return string
     */
    protected function randomStr($len)
    {
        $str = '';
        for ($i = 0; $i < $len; $i++) {
            $str .= chr(mt_rand(65, 90));
        }
        return $str;
    }

}