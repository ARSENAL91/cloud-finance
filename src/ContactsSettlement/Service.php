<?php


namespace Wwjpackages\CloudFinance\ContactsSettlement;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const URL = '/api/api/voucher/getSixExchangesData';
    const URLMONTH = '/api/api/voucher/getSixExchangesMonthData';
    public function index(array $data): array
    {
        $params = [
            'key' => $data['key'] ?? '',//公司秘钥 字符串
            'the_date' => $data['the_date'] ?? [],//日期数组区间
        ];
        return $this->attempt('post', self::URL, $params);
    }
    public function monthData(array $data): array
    {
        $params = [
            'key' => $data['key'] ?? '',
            'start_date' => $data['start_date'] ?$data['start_date']: '0000-00-00',
            'end_date' => $data['end_date'] ? $data['end_date']: '0000-00-00',
        ];
        return $this->attempt('post', self::URLMONTH, $params);
    }

}
