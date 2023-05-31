<?php


namespace Wwjpackages\CloudFinance\Reimburse;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const SYNC = '/api/api/reimburses/sync';
    const VOUCHER = '/api/api/reimburses/voucherRecords';

    /**
     * 同步
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sync(array $data): array
    {
        $params = [
            'reimburse' => $data['reimburse'] ?? '',
            'code' => $data['code'],
            'config_name' => $data['config_name'] ?? '',
            'voucher_records' => $data['voucher_records'] ?? '',
            'binding_code' => $data['binding_code'] ?? '',
        ];
        return $this->attempt('post', self::SYNC, $params);
    }

    /**
     * 报销凭证记录
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function voucher(array $data): array
    {
        $params = [
            'code' => $data['code'],
        ];
        return $this->attempt('get', self::VOUCHER, $params);
    }
}