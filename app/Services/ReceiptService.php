<?php

namespace App\Services;

use Carbon\Carbon;
use Faker\Provider\Image;


/**
 * Created by PhpStorm.
 * User: asd755045
 * Date: 2017/4/23
 * Time: 下午 09:40
 */
class ReceiptService/*商業邏輯*/
{
    /*中介站*/
    public function converter($receiptData, $person, $receiptNo)
    {
        /*收據明細*/
        $result = $this->getReceiptDetail(/*json_decode(*/
            $receiptData/*)*/, $person, $receiptNo);
//        /*轉換成Json*/
//        $result['data'] = json_decode($receiptData);
        /*今天日期*/
        $result['today'] = str_replace('-', '/', Carbon::today('Asia/Taipei')->toDateString());
        /*最後一次奉獻日期*/
        // dd($result['data']);
        $account_date = str_replace('-', '', ($receiptData[count($receiptData) - 1]->account_date));

        /*收據編號-民國年*/
        $result['receipt_no_1'] = (((int)substr($result['today'], 0) - 1911));
        /*收據編號-會員編號*/
        $result['receipt_no_2'] = $receiptData[0]->member_no;
        /*會員編號不足三碼，須補足它*/
        while (strlen($result['receipt_no_2']) < 3) {
            $result['receipt_no_2'] = "0" . $result['receipt_no_2'];
        }
        /*金額加總*/
        $result['total'] = $this->getAmountTotal($receiptData);
        /*阿拉伯數字轉中文字*/
        $result['total_tw'] = $this->NumberToChinese($result['total']);
        /*收據代碼(姓名右下方)*/
        $result['identify'] = (((int)substr($account_date, 0, 4)) - 1911) . substr($account_date, 4) . strtolower($receiptData[0]->cert_type);
        /*付款方式*/
        switch ($receiptData[0]->cert_type) {
            case "C":
                $result['cert_type'] = "■現金□劃撥□銀行□信用卡";
                break;
            case "P":
                $result['cert_type'] = "□現金■劃撥□銀行□信用卡";
                break;
            case "B":
                $result['cert_type'] = "□現金□劃撥■銀行□信用卡";
                break;
            case "S":
                $result['cert_type'] = "□現金□劃撥□銀行■信用卡";
                break;
        }
        /*用途*/
        switch ($person->member_type) {
            case "G":
                $result['member_type'] = "■奉獻□贊助會員□其他:";
                break;
            case "S":
                $result['member_type'] = "□奉獻■贊助會員□其他:";
                break;
            default:
                $result['member_type'] = "□奉獻□贊助會員■其他:";
                break;
        }
        /*會員通訊地址*/
        $result['address'] = $person->add2_zipcode . $person->add2_city . substr($person->add2_dist, 0, -3) . $person->add2_street;
        /*會員電話*/
        $result['phone'] = substr($person->mobile, 0, 4) . "-" . substr($person->mobile, 4, 3) . "-" . substr($person->mobile, 7, 3);
        //   unset($result['data']);
        //dd($result);
        return $result;
    }

    /*金額加總*/
    private function getAmountTotal($num)
    {
        $total = collect([]);
        for ($i = 0; $i < count($num); $i++) {
            $total->push($num[$i]->account_amount);
        }
        $total = $total->sum();
        return $total;
    }

    /*阿拉伯數字轉中文字*/
    private function NumberToChinese($num)
    {
        $zh_num = ['零', '壹', '貳', '參', '肆', '伍', '陸', '柒', '捌', '玖'];
        $zh_unit = ['分', '角', '元', '拾', '佰', '仟', '萬', '拾', '佰', '仟', '億', '拾', '佰', '仟'];
        if (!is_numeric(str_replace(',', '', $num))) {
            return $num;
        }
        $number = strrev(round(str_replace(',', '', $num), 2) * 100);
        //$length = strlen($number);
        $ch_str = '';
        for ($length = strlen($number); $length > 0; $length--) {
            $index = $length - 1;
            if ($number[$index] == '0' && !in_array($zh_unit[$index], ['萬', '元', '億'])) {
                $ch_str .= $zh_num[$number[$index]];
            } elseif ($number[$index] == '0' && in_array($zh_unit[$index], ['萬', '元', '億'])) {
                $ch_str .= $zh_unit[$index];
            } else {
                $ch_str .= $zh_num[$number[$index]] . $zh_unit[$index];
            }
        }
        // $format_str = trim(str_replace(['零零', '零萬', '零元', '零億'], ['零', '萬', '元', '億'], $ch_str), '零');
        $format_str = rtrim(str_replace(['零零', '零萬', '零元', '零億'], ['零', '萬', '元', '億'], $ch_str), '零');
        if (preg_match('/(分|角)/', $format_str) === 0) {
            $format_str .= '整';
        }
        return str_replace("元整", "", $format_str);
    }

    /*明細*/
    private function getReceiptDetail($data, $person, $receiptNo)
    {
        $information['no'] = $person->no;
        $information['name'] = $person->devotee_name;
        for ($i = 0; $i <= (count($data) - 1); $i++) {
            /*編號*/
            $information['detail'][$i]['no'] = $receiptNo[$i]->no;
            /*月*/
            $information['detail'][$i]['month'] = str_replace('0', '', substr($data[$i]->account_date, 5, 1)) . substr($data[$i]->account_date, 6, 1);
            /*日*/
            $information['detail'][$i]['date'] = str_replace('0', '', substr($data[$i]->account_date, 8, 1)) . substr($data[$i]->account_date, 9, 1);
            /*會計科目1*/
            $information['detail'][$i]['subclass1'] = $data[$i]->subclass1_name;
            /*會計科目2*/
            $information['detail'][$i]['subclass2'] = $data[$i]->subclass2_name;
            /*備註*/
            $information['detail'][$i]['memo'] = $data[$i]->account_memo;
            /*單筆金額*/
            $information['detail'][$i]['amount'] = $data[$i]->account_amount;
        }
        //  dd($information);
        return $information;
    }
}