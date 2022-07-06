<?php


namespace Wwjpackages\CloudFinance\AccountingBook;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const SUBJECT_BALANCE = '/api/api/accountingBooks/subjectBalances';//科目余额表


    public function subjectBalance(array $data): array
    {
        $params = [
            'the_date' => $data['the_date'],//日期
            'currency_id' => 0//目前只支持综合本位币
        ];
        return $this->attempt('get', self::SUBJECT_BALANCE, $params);
    }
}