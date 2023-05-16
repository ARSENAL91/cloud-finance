<?php


namespace Wwjpackages\CloudFinance\Voucher;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const URL = '/api/api/voucher/checkHasVoucher';
    const STORE = '/api/api/vouchers';
    const INDEX = '/api/api/vouchers';


    public function checkHasVoucher(array $data): array
    {
        $params = [
            'company_name' => $data['company_name'] ?? '',//公司名称
            'receipt_type' => $data['receipt_type'] ?? [],//单据
            'product_kind' => $data['product_kind'] ?? [],//类型
            'the_month' => $data['the_month'] ?? [],//日期
        ];
        return $this->attempt('get', self::URL, $params);
    }

    public function index(array $data): array
    {
        $params = [
            'ids' => $data['ids']
        ];
        return $this->attempt('get', self::INDEX, $params);
    }

    public function store(array $data): array
    {
        $params = [
            'company_id' => $data['company_id'] ?? 0,
            'account_set_id' => $data['account_set_id'] ?? 0,
            'ADR_id' => $data['ADR_id'] ?? 0,
            'serial_num' => $data['serial_num'] ?? '',
            'the_date' => $data['the_date'],
            'source' => $data['source'],
            'records' => $data['records']
        ];
        return $this->attempt('post', self::STORE, $params);
    }

}
