<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Orchestra\Parser\Xml\Facade as XmlParser;

class LogInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loginfo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'is loginfo';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $year = ltrim(Carbon::now()->subYears(1911)->format("Y"), "0"); /*抓取今年的年份減掉1911年，Y為四位數利用ltrim去除0*/
        $month = 0;
        $post_file_test = get_headers("http://download.post.gov.tw/post/download/Xml_" . $year . $month . ".xml");/*get_headers($url)會以陣列方式，回傳這個網址的狀態*/
        $test = stripos($post_file_test[0], 'ok');/*搜尋陣列是否有ok，如(HTTP/1.0 200 OK)*/
        while ($test == '') {/*持續嘗試網站是否正確，正確則跳出*/
            $month++;
            $month = str_pad($month, 2, '0', STR_PAD_LEFT);/*用0從左邊將 $month值 補滿至兩位數*/
            $post_file_test = get_headers("http://download.post.gov.tw/post/download/Xml_" . $year . $month . ".xml");
            $test = stripos($post_file_test[0], 'ok');
        }
        $xml = XmlParser::load("http://download.post.gov.tw/post/download/Xml_" . $year . $month . ".xml");/*載入本地端或網上Xml檔案*/
        $addresses = $xml->getContent();/*抓取所有內容*/
        $need = array();
        foreach ($addresses as $address => $value) {
            $need[] = $value->欄位4;/*將<欄位4>的值一個個抓出來存入陣列*/
        }
        $remove_same = array_unique($need);/*刪除陣列中重複的項目*/
        $reorder_array = array_values($remove_same);/*重新排列陣列中的建值*/
        $cancel_xml = json_decode(json_encode((array)$reorder_array), TRUE);/*取消xml的格式*/
        $merge_array = call_user_func_array('array_merge', $cancel_xml);/*將多維陣列合併成一維陣列*/
        $city = array();
        $dist = array();
        foreach ($merge_array as $array) {
            $city[] = substr($array, 0, 9);/*抓取縣市放入陣列*/
            $dist[] = substr($array, 9);/*抓取鄉鎮市區放入陣列*/
        }
        $merge_address = array();
        foreach ($city as $key => $value1) {
            $merge_address[$value1][] = $dist[$key];/*合併兩個陣列，將縣市設為所索引，鄉鎮市區設為值*/
        }
        $fp_address = fopen('public/downloads/address.json', 'w');/*將檔案新建至指定的路徑*/
        fwrite($fp_address, json_encode($merge_address));/*將陣列寫入檔案已 JSON 格式儲存*/
        fclose($fp_address);/*關閉新增*/
        Log::info('你好！這裡剛執行完address的下載與轉檔 to JSON');
    }
}
