<?php


namespace Wwjpackages\CloudFinance\Voucher;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const URL = '/api/api/voucher/checkHasVoucher';
    public function index(array $data): array
    {
        $params = [
            'company_name' => $data['company_name'] ?? '',//公司名称
            'contract_type' => $data['contract_type'] ?? [],//类型id
            'product_type' => $data['product_type'] ?? [],//类型id
            'the_month' => $data['the_month'] ?? [],//日期
        ];
        return $this->attempt('post', self::URL, $params);
    }

}
