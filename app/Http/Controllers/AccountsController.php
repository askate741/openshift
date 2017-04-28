<?php

namespace App\Http\Controllers;

use App\Account;
use App\Account_class;
use App\Church;
use App\Credit_card;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\MemberRequest;
use App\Member;
use App\Sub1class;
use App\Sub2class;
use App\Subclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $where = 'account';
        /*在 tcrm.home 新增 */
        /*在 tcrm.account  if*/
        $pages = 'show';
        /*在 tcrm.home 分頁 */
        $names = 'accounts';
        $update = 'show';
        /*在 tcrm.home 上傳 */
        $tabs = Account::all();
        return view('tcrm.account', compact('tabs', 'where', 'pages', 'perPage', 'update', 'names'));
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
        $out = Account_class::join('sub1classes', 'account_classes.subclass1_no', '=', 'sub1classes.no')/*Join 兩張表進行篩選,收入*//*Join 兩張表進行篩選,支出*/
        ->where('class', '1')
            ->pluck('subclass1_name', 'sub1classes.no');

//        $subclass2_out = Account_class::join('sub2classes', 'account_classes.subclass2_no', '=', 'sub2classes.no')/*Join 兩張表進行篩選,收入*//*Join 兩張表進行篩選,支出*/
//        ->where('class', '1')
//            ->pluck('subclass2_name', 'sub2classes.no');
        $members = Member::pluck('devotee_name', 'no');/*可顯示能選擇的會員名稱*/
        if (Member::all()->last() == null) {
            $member_last = 0;
        } else {
            $member_last = Member::all()->last()->no;
        }
        $churches = Church::pluck('church_name', 'no');
        if (Church::all()->last() == null) {
            $last = 0;
        } else {
            $last = Church::all()->last()->no;
        }
        return view('pages.account_wizard', compact('where', 'in', 'out'/*, 'subclass2_in'*//*, 'subclass2_out'*/, 'members', 'member_last', 'churches', 'last'));
    }

    public function getSub2classIn($no)/*ajax抓收入會計科目2*/
    {
        $sub2class = Account_class::join('sub2classes', 'account_classes.subclass2_no', '=', 'sub2classes.no')/*Join 兩張表進行篩選,收入*/
        ->where('class', '0')->where('account_classes.subclass1_no', $no)->get();
        return response()->json($sub2class);
    }

    public function getSub2classOut($no)/*ajax抓支出會計科目2*/
    {
        $sub2class = Account_class::join('sub2classes', 'account_classes.subclass2_no', '=', 'sub2classes.no')/*Join 兩張表進行篩選,收入*/
        ->where('class', '1')->where('account_classes.subclass1_no', $no)->get();
        return response()->json($sub2class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AccountRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        if ($request['birthday'] == null) {
            $request['birthday'] = null;
        }
        if ($request['date_out'] == null) {
            $request['date_out'] = null;
        }
        if ($request['devotee_name'] == null) {
            Account::create($request->all());
        } else {
            if ($request['church_name'] == null and $request['card_id'] == null) {
                Member::create($request->all());
                Account::create($request->all());
            } elseif ($request['church_name'] == null) {
                Credit_card::create($request->all());
                $request['credit_card_no'] = Credit_card::all()->last()->no;
                Member::create($request->all());
                Account::create($request->all());
            } elseif ($request['card_id'] == null) {
                Church::create($request->all());
                Member::create($request->all());
                Account::create($request->all());
            } else {
                Credit_card::create($request->all());
                $request['credit_card_no'] = Credit_card::all()->last()->no;
                Church::create($request->all());
                Member::create($request->all());
                Account::create($request->all());
            }
        }
        return redirect('account');
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
        /*在 tcrm.account  elseif*/
        $update = 'show';
        /*在 tcrm.home 上傳 */
        $names = 'accounts';
        $pages = '';
        /*在 tcrm.home 分頁 */
        $account = Account::findOrFail($no);
        $data_no = json_encode(Account::pluck('no')->toArray());
        return view('show.account', compact('account', 'data_no','where', 'pages', 'update', 'names'));
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
        $members = Member::pluck('devotee_name', 'no');
        $in = Account_class::join('sub1classes', 'account_classes.subclass1_no', '=', 'sub1classes.no')/*Join 兩張表進行篩選,收入*/
        ->where('class', '0')
            ->pluck('subclass1_name', 'sub1classes.no');
        $out = Account_class::join('sub1classes', 'account_classes.subclass1_no', '=', 'sub1classes.no')/*Join 兩張表進行篩選,支出*/
        ->where('class', '1')
            ->pluck('subclass1_name', 'sub1classes.no');
        $subclass2 = Account_class::join('sub2classes', 'account_classes.subclass2_no', '=', 'sub2classes.no')
            ->where('account_classes.subclass1_no', Account_class::where('no', Account::where('no', $no)->value('account_class_no'))->value('subclass1_no'))
            ->pluck('subclass2_name', 'sub2classes.no');
        $account_data = Account::join('account_classes', 'accounts.account_class_no', "=", 'account_classes.no')->findOrFail($no);/*帶出所有資料*/
        $account = Account::findOrFail($no);
        return view('forms.account', compact('where', 'account_data', 'account', 'members', 'in', 'out', 'subclass2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $no
     * @param AccountRequest|Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update($no, AccountRequest $request)
    {
        $account = Account::findOrFail($no);
        if($request['class']==1){
            $request['member_no']=null;
        }
        $account->update($request->all());
        return redirect('account');
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
        $account = Account::findOrFail($no);
        $account->delete();
        return redirect('account');
    }
    public function delete($no)/*在首頁進行刪除*/
    {
        Account::find($no)->delete();
        return  redirect('account');
    }

    public function export()
    {
        $export = Account::select('*')->get();
        Excel::create('帳務表', function ($excel) use ($export) {
            $excel->sheet('account', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }

    public function getImport()
    {
        $where = 'account';
        /*在 tcrm.home 新增 */
        /*在 tcrm.account  if*/
        $pages = 'show';
        /*在 tcrm.home 分頁 */
        $update = 'update';
        /*在 tcrm.home 上傳 */
        $tabs = Account::all();
        return view('tcrm.account', compact('tabs', 'where', 'pages', 'perPage', 'update'));
    }

    public function postImport()
    {
        $where = 'account';
        /*在 tcrm.home 新增 */
        /*在 tcrm.account  if*/
        $pages = 'show';
        /*在 tcrm.home 分頁 */
        $update = 'update';
        /*在 tcrm.home 上傳 */
        $tabs = Account::all();
        Excel::load(Input::file('file'), function ($reader) {
            foreach ($reader->toArray() as $row) {
                Account::firstOrCreate($row);
            }
        });
        return view('pages.OK', compact('tabs', 'where', 'pages', 'perPage', 'update'));
    }

}