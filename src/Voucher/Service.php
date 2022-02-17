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
            'receipt_type' => $data['receipt_type'] ?? [],//单据
            'product_kind' => $data['product_kind'] ?? [],//类型
            'the_month' => $data['the_month'] ?? [],//日期
        ];
        return $this->attempt('post', self::URL, $params);
    }

}
