<?php

namespace App\Http\Controllers;

use Orchestra\Parser\Xml\Facade as XmlParser;

class ArrayController extends Controller
{
    public function index()
    {
        ini_set('memory_limit', '256M'); /*暫時增加內存*/
        $xml = XmlParser::load('downloads/Xml_10510.xml');/*載入本地端或網上Xml檔案*/
        $addresses = $xml->getContent();/*抓取所有內容*/
        $my_array = array();
        $my_array2 = array();
        foreach ($addresses as $address => $value) {
            $my_array[] = $value->欄位4;/*將<欄位4>的值一個個抓出來存入陣列*/
        }
        foreach ($addresses as $address => $value2) {
            $my_array2[] = $value2->欄位1;/*將<欄位1>的值一個個抓出來存入陣列*/
        }
//        $result = array_unique($my_array);/*刪除陣列中重複的項目*/
//        $result2 = array_values($my_array);/*重新排列陣列中的建值*/
        $array = json_decode(json_encode((array)$my_array), TRUE);/*取消xml的格式*/
        $oneDimensional = call_user_func_array('array_merge', $array);/*將多維陣列合併成一維陣列*/
//        $res = array_unique($my_array2);/*刪除陣列中重複的項目*/
//        $res2 = array_values($my_array2);/*重新排列陣列中的建值*/
        $array2 = json_decode(json_encode($my_array2), TRUE);/*取消xml的格式*/
        $oneDimensional2 = call_user_func_array('array_merge', $array2);

        $o1 = array();
        $o2 = array();
        $o3 = array();
        $o4 = array();
        $o2_1 = array();

        foreach ($oneDimensional2 as $oo2) {
            $o3[] = substr($oo2, 0, 3);
        }
        foreach ($oneDimensional as $key => $oo3) {
            $o4[] = $oo3 . $o3[$key];
        }
        $o4 = array_unique($o4);/*刪除陣列中重複的項目*/
        $o4 = array_values($o4);/*重新排列陣列中的建值*/
        foreach ($o4 as $oo) {
            $o1[] = substr($oo, 0, 9);/*抓取縣市放入陣列*/
            $o2[] = /*substr(*/substr($oo, 9)/*, 0, -3)*/;/*抓取鄉鎮市區放入陣列*/
            $o2_1[] = substr($oo, -3);/*抓取鄉鎮市區放入陣列*/
        }


        $return = array();
        foreach ($o1 as $key1 => $value1) {
            $return[$value1][] = $o2[$key1];/*合併兩個陣列，將縣市設為鍵名，鄉鎮市區設為建值*/
        }

//
//        $fp = fopen('downloads/address.json', 'w');
//        fwrite($fp, json_encode($return));
//        fclose($fp);
//        $json=json_encode($return);
////        dd($json);
        echo "<pre>";
        print_r($o2_1);
        echo "<pre>";
        print_r($return);
        echo "<pre>";
//        print_r($return);/*檢視結果*/
//        echo "</pre>";
//        $data = file_get_contents('downloads/address.json');/*取得檔案*/
//        $data = json_decode($data, true); /*將json字串轉成陣列*/
//        $city = array_keys($data);/*取出陣列的索引*/
////        $city = json_encode($city);/*透過json_edcode，將 $city 轉成物件，存入 $city */
////        $dist = json_encode($data);/*透過json_edcode，將 $data 轉成物件*，存入 $dist */
        return view('template');
    }
}
