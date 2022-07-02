<?php


namespace Wwjpackages\CloudFinance\Sheet;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const BALANCE_SHEET = '/api/api/sheets/balanceSheets';
    const PROFIT_SHEET = '/api/api/sheets/profitSheets';

    /**
     * 资产负债表
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function balanceSheet(array $data): array
    {
        $params = [
            'the_month' => $data['the_month'],//日期
            'classification' => $data['classification'] ?? 'n',//重分类
        ];
        return $this->attempt('get', self::BALANCE_SHEET, $params);
    }

    /**
     * 利润表
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function profitSheet(array $data): array
    {
        $params = [
            'the_month' => $data['the_month'],//日期
        ];
        return $this->attempt('get', self::PROFIT_SHEET, $params);
    }
}
