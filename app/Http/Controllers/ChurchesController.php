<?php

namespace App\Http\Controllers;

use App\Church;
use App\Http\Requests\ChurchRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ChurchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $where = 'church';  /*在 tcrm.church 新增 */ /*在 tcrm.church 下載的網址 */
        $pages = 'show';    /*在 tcrm.church 分頁 */
        $names = 'churches';/*上傳的網址*/
        $update = 'show';   /*在 tcrm.button 往上傳網站 */
        $tabs  = Church::all ();
        return view('tcrm.church', compact('tabs', 'where', 'pages', 'perPage', 'update', 'names','tabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $where = 'create';/*在 tcrm.church 新增 */
        return view('forms.church', compact('where'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChurchRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChurchRequest $request)
    {
        Church::create($request->all());
        return redirect('church');
    }

    /**
     * Display the specified resource.
     *
     * @param $no
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($no/*, Request $request*/)
    {   
        $where = 'show'; /*在 tcrm.church 新增 */ /*在 tcrm.church 下載的網址 */
        $update = 'show';   /*在 tcrm.button 往上傳網站 */
        $names = 'churches';/*tcrm.button  上傳的網址*/
        $pages = '';    /*在 tcrm.button 分頁 */
        $church = Church::findOrFail($no);
        $data_no = json_encode(Church::pluck('no')->toArray());
        return view('show.church', compact('church', 'data_no','where', 'pages', 'update', 'names','tabs'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $no
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($no)
    {
        $where = 'edit';
        $church = Church::findOrFail($no);
//        $data = file_get_contents('downloads/address.json');/*取得檔案*/
//        $data = json_decode($data, true); /*將json字串轉成陣列*/
//        $city = array_keys($data);/*取出陣列的索引*/
//        $city = json_encode($city);/*透過json_edcode，將 $city 轉成物件，存入 $city */
//        $dist = json_encode($data);/*透過json_edcode，將 $data 轉成物件*，存入 $dist */
        return view('forms.church', compact('where', 'church'/*,'city','data'*/));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $no
     * @param ChurchRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update($no, ChurchRequest $request)
    {
        $church = Church::findOrFail($no);
        $church->update($request->all());
        return redirect('church');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $no
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($no)
    {
        $church = Church::findOrFail($no);
        $church->delete();
        return redirect('church');
    }
    public function delete($no)/*在首頁進行刪除*/
    {
        Church::find($no)->delete();
        return  redirect('church');
    }

    public function export()
    {
        $export = Church::select('*')->get();
        Excel::create('教會名錄', function ($excel) use ($export) {
            $excel->sheet('church', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }

    public function getImport()
    {
        $where = 'church';/*在 tcrm.church 新增 */ /*在 tcrm.church 下載的網址 */
        $pages = 'show';/*在 tcrm.button 分頁 */
        $update = 'update' ; /*在 tcrm.button 上傳 */
        $tabs  = Church::all ();
        return view('tcrm.church', compact('tabs', 'where', 'pages', 'perPage', 'update'));
    }

    public function postImport()
    {
        $where = 'church';/*在 tcrm.church 新增 */ /*在 tcrm.church 下載的網址 */
        $pages = 'show';/*在 tcrm.button 分頁 */
        $update = 'update' ; /*在 tcrm.button 上傳 */
        $tabs  = Church::all ();
        Excel::load(Input::file('file'), function ($reader) {
            foreach ($reader->toArray() as $row) {
                Church::firstOrCreate($row);
            }
        });
        return view('pages.OK', compact('tabs', 'where', 'pages', 'perPage', 'update'));
    }

}