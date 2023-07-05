<?php


namespace Wwjpackages\CloudFinance\BankDetail;


use Wwjpackages\CloudFinance\Kernel\BaseService;

class Service extends BaseService
{
    const SyncDetail = '/api/api/bank/detail/sync';
    const SyncReceipt = '/api/api/bank/receipt/sync';

    public function syncDetail(array $data): array
    {
        $params = [
            'account' => $data['account'],
            'acc_name' => $data['acc_name'],
            'bank_name' => $data['bank_name'],
            'receive_way_id' => $data['receive_way_id'] ?: 0,
        ];
        foreach ($data['detail'] as $v) {
            $params['detail'][] = [
                'serial_code' => $v['serial_code'],
                'the_date' => $v['the_date'],
                'the_time' => $v['the_time'],
                'receive_trans' => $v['receive_trans'],
                'receive_amount' => $v['receive_amount'],
                'trans_amount' => $v['trans_amount'],
                'pay_account' => $v['pay_account'],
                'pay_name' => $v['pay_name'],
                'receiver_account' => $v['receiver_account'],
                'receiver_name' => $v['receiver_name'],
                'the_type' => $v['the_type'],
                'purpose' => $v['purpose'],
                'reference' => $v['reference'],
                'comments' => $v['comments'],
                'use_way' => $v['use_way'],
                'unique_id' => $v['unique_id'],
                'reimbursement' => $v['reimbursement'] ?: [],
            ];
        }
        $condition = ['data' => json_encode($params)];
        return $this->attempt('post', self::SyncDetail, $condition);
    }


    public function syncReceipt(array $data): array
    {
        $params = [
            'account' => $data['account'],
            'acc_name' => $data['acc_name'],
            'bank_name' => $data['bank_name'],
            'receive_way_id' => $data['receive_way_id'] ?: 0,
        ];
        foreach ($data['detail'] as $v) {
            $params['detail'][] = [
                'serial_code' => $v['serial_code'],
                'inner_no' => $v['inner_no']?:'',
                'the_date' => $v['the_date'],
                'url' => $v['url'],
            ];
        }
        $condition = ['data' => json_encode($params)];
        return $this->attempt('post', self::SyncReceipt, $condition);
    }
}