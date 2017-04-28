<?php

namespace App\Http\Controllers;

use App\Account_class;
use App\Http\Requests\Account_classRequest;
use App\Sub1class;
use App\Sub2class;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class AccountClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $where = 'account_class';
        /*在 tcrm.home 新增 */
        /*在 tcrm.$account_class  if*/
        $pages = 'show';
        /*在 tcrm.home 分頁 */
        $names = 'account_classes';
        $update = 'show';
        /*在 tcrm.home 上傳 */
        $tabs = Account_class::all();
        return view('tcrm.account_class', compact('tabs', 'where', 'pages', 'perPage', 'update', 'names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $where = 'create';
        $in = Account_class::join('sub1classes', 'account_classes.subclass1_no', '=', 'sub1classes.no')/*Join 兩張表進行篩選,收入*/
        ->where('class', '0')
            ->pluck('subclass1_name', 'sub1classes.no');
        $out = Account_class::join('sub1classes', 'account_classes.subclass1_no', '=', 'sub1classes.no')/*Join 兩張表進行篩選,支出*/
        ->where('class', '1')
            ->pluck('subclass1_name', 'sub1classes.no');
        if (Sub1class::all()->last() == null) {
            $subclass1_last = 0;
        } else {
            $subclass1_last = Sub1class::all()->last()->no;
        }
        return view('forms.account_class', compact('where', 'subclass1_last', 'in', 'out'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Account_classRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Account_classRequest $request)
    {

        if ($request['subclass1_name'] == null) {
            Sub2class::create($request->all());
            $request['subclass2_no'] = Sub2class::all()->last()->no;
            Account_class::create($request->all());
        } else {
            Sub1class::create($request->all());
            Sub2class::create($request->all());
            $request['subclass2_no'] = Sub2class::all()->last()->no;
            Account_class::create($request->all());
        }
        return redirect('account_class');
    }

    /**
     * Display the specified resource.
     *
     * @param $no
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($no)
    {

        $where = 'show';
        /*在 tcrm.church  elseif*/
        $update = 'show';
        /*在 tcrm.home 上傳 */
        $names = 'account_classes';
        $pages = '';
        $account_class = Account_class::findOrFail($no);
        $data_no = json_encode(Account_class::pluck('no')->toArray());
        return view('show.account_class', compact('where','data_no', 'account_class', 'pages', 'update', 'names'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $no
     * @return \Illuminate\Http\Response
     * @internal param Account_classRequest $request
     * @internal param int $id
     */
    public function edit($no)
    {
        $where = 'edit';
        $in = Account_class::join('sub1classes', 'account_classes.subclass1_no', '=', 'sub1classes.no')/*Join 兩張表進行篩選,收入*/
        ->where('class', '0')
            ->pluck('subclass1_name', 'sub1classes.no');
        $out = Account_class::join('sub1classes', 'account_classes.subclass1_no', '=', 'sub1classes.no')/*Join 兩張表進行篩選,支出*/
        ->where('class', '1')
            ->pluck('subclass1_name', 'sub1classes.no');
        if (Sub1class::all()->last() == null) {
            $subclass1_last = 0;
        } else {
            $subclass1_last = Sub1class::all()->last()->no;
        }
        $account_class = Account_class::findOrFail($no);
        return view('forms.account_class', compact('where', 'in', 'out', 'subclass1_last', 'account_class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Account_classRequest|\Illuminate\Http\Request $request
     * @param $no
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update($no,Account_classRequest $request)
    {
        $account_class = Account_class::findOrFail($no);
        $account_class->update($request->all());
       Sub2class::findOrFail($request['subclass2_no'])->update($request->all());
        return redirect('account_class');
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
        $account_class = Account_class::findOrFail($no);
        $account_class->delete();
        return redirect('account_class');
    }
    public function delete($no)/*在首頁進行刪除*/
    {
       Account_class::find($no)->delete();
        return  redirect('account_class');
    }


    public function export()
    {
        $export = Account_class::select('*')->get();
        Excel::create('會計科目表', function ($excel) use ($export) {
            $excel->sheet('account_class', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }

    public function p_export()
    {
        $export = Sub1class::select('*')->get();
        Excel::create('會計科目大項', function ($excel) use ($export) {
            $excel->sheet('subclass', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }

    public function getImport()
    {
        $where = 'account_class';
        /*在 tcrm.home 新增 */
        /*在 tcrm.account_class  if*/
        $pages = 'show';
        /*在 tcrm.home 分頁 */
        $update = 'update';
        /*在 tcrm.home 上傳 */
        $tabs = Account_class::all();
        return view('tcrm.account_class', compact('tabs', 'where', 'pages', 'perPage', 'update'));
    }

    public function postImport()
    {
        $where = 'account_class';
        /*在 tcrm.home 新增 */
        /*在 tcrm.account_class  if*/
        $pages = 'show';
        /*在 tcrm.home 分頁 */
        $update = 'update';
        /*在 tcrm.home 上傳 */
        $tabs = Account_class::all();

        Excel::load(Input::file('p_file'), function ($reader) {
            foreach ($reader->toArray() as $row) {
                Sub1class::firstOrCreate($row);
            }
        });
        Excel::load(Input::file('file'), function ($reader) {
            foreach ($reader->toArray() as $row) {
                Account_class::firstOrCreate($row);
            }
        });
        return view('pages.OK', compact('tabs', 'where', 'pages', 'perPage', 'update'));
    }
}
