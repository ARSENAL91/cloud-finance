<?php


namespace Wwjpackages\CloudFinance\Tax;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const DECLARATION_SHEET = '/api/api/tax/declarationSheets';

    /**
     * 增值税申报表
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function declarationSheet(array $data): array
    {
        $params = [
            'the_month' => $data['the_month'],//日期
        ];
        return $this->attempt('get', self::DECLARATION_SHEET, $params);
    }
}
