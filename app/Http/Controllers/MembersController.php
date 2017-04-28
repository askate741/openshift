<?php

namespace App\Http\Controllers;

use App\Church;
use App\Credit_card;
use App\Http\Requests\MemberRequest;
use App\Member;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $where = 'member';   /*在 tcrm.member 新增 */ /*在 tcrm.member 下載的網址 */
        $pages = 'show';    /*在 tcrm.home 分頁 */
        $names = 'members'; /*在 tcrm.member  if*/
        $update = 'show';   /*在 tcrm.home 上傳 */
        $tabs = Member::all();
        return view('tcrm.member', compact('tabs', 'where', 'pages', 'perPage', 'update', 'names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $where = 'create';/*在 tcrm.member 新增 */
        $churches = Church::pluck('church_name', 'no');
        if (Church::all()->last() == null) {
            $last = 0;
        } else {
            $last = Church::all()->last()->no;
        }
        return view('pages.member_wizard', compact('where', 'churches', 'last'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MemberRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {

        if ($request['birthday'] == null) {
            $request['birthday'] = null;
        }
        if ($request['date_out'] == null) {
            $request['date_out'] = null;
        }
        if ($request['church_name'] == null and $request['card_id'] == null) {
            Member::create($request->all());
        } elseif ($request['church_name'] == null) {
            Credit_card::create($request->all());
            $request['credit_card_no'] = Credit_card::all()->last()->no;
            Member::create($request->all());
        } elseif ($request['card_id'] == null) {
            Church::create($request->all());
            Member::create($request->all());
        } else {
            Credit_card::create($request->all());
            $request['credit_card_no'] = Credit_card::all()->last()->no;
            Church::create($request->all());
            Member::create($request->all());
        }
        return redirect('member');
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
        $where = 'show';   /*在 tcrm.member 新增 */ /*在 tcrm.memberz 下載的網址 */
        $update = 'show';   /*在 tcrm.button 往上傳網站 */
        $names = 'member';/*tcrm.button  上傳的網址*/
        $pages = '';        /*在 tcrm.home 分頁 */
        $member = Member::findOrFail($no);
        $data_no = json_encode(Member::pluck('no')->toArray());
        return view('show.member', compact('member', 'data_no', 'where', 'pages', 'update', 'names'));
    }

    /*    public function showCheck($no, Request $request)
        {
            if ($request->ajax()) {

                return response()->json();
            }
        }*/

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
        $churches = Church::pluck('church_name', 'no');
        if (Member::findOrFail($no)->credit_card_no == null) {
            $member = Member::findOrFail($no);
            $member_data = $member;
        } else {
            $member = Member::findOrFail($no);
            $member_data = Member::join('credit_cards', 'members.credit_card_no', "=", 'credit_cards.no')->findOrFail($no);
        }

        return view('forms.member_wizard', compact('where', 'member', 'member_data', 'churches', 'credit_card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $no
     * @param MemberRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update($no, MemberRequest $request)
    {
        if ($request['birthday'] == null) {
            $request['birthday'] = null;
        }
        if ($request['date_out'] == null) {
            $request['date_out'] = null;
        }
        $member = Member::findOrFail($no);
        if ($request['credit_card_radio'] == 'yes') {
            if ($member->credit_card_no != null) {
                Credit_card::findOrFail($member->credit_card_no)->update($request->all());
            } else {
                if (Credit_card::all()->last() == null) {
                    $request['credit_card_no'] = 1;
                    Credit_card::create($request->all());
                } else {
                    $request['credit_card_no'] = Credit_card::all()->last()->no + 1;
                    Credit_card::create($request->all());
                }
            }
        }
        $member->update($request->all());
        return redirect('member');
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
        $member = Member::findOrFail($no);
        $credit_card_no = $member->credit_card_no;
        if ($credit_card_no != null) {
            Credit_card::findOrFail($credit_card_no)->delete();
        }
        $member->delete();
        return redirect('member');
    }

    public function delete($no)/*在首頁進行刪除*/
    {
        $member = Member::findOrFail($no);
        $credit_card_no = $member->credit_card_no;
        if ($credit_card_no != null) {
            Credit_card::findOrFail($credit_card_no)->delete();
        }
        $member->delete();
        return redirect('member');
    }

    public function export()
    {
        $export = Member::select('*')->get();
        Excel::create('會員資料', function ($excel) use ($export) {
            $excel->sheet('member', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }

    public function getImport()
    {
        $where = 'member';   /*在 tcrm.member 新增 */ /*在 tcrm.member 下載的網址 */
        $pages = 'show';   /*在 tcrm.button 分頁 */
        $update = 'update';  /*在 tcrm.button 上傳 */
        $tabs = Member::all();
        return view('tcrm.member', compact('tabs', 'where', 'pages', 'perPage', 'update'));
    }

    public function postImport()
    {
        $where = 'member'; /*在 tcrm.member 新增 */ /*在 tcrm.member 下載的網址 */
        $pages = 'show';    /*在 tcrm.button 分頁 */
        $update = 'update';; /*在 tcrm.button 上傳 */
        $tabs = Member::all();
        Excel::load(Input::file('file'), function ($reader) {
            foreach ($reader->toArray() as $row) {
                Member::firstOrCreate($row);
            }
        });
        return view('pages.OK', compact('tabs', 'where', 'pages', 'perPage', 'update'));
    }
}
