<?php

namespace App\Http\Controllers;

use App\Account;
use App\Account_class;
use App\Member;
use App\Repositories\ReceiptRepository;
use App\Sub1class;
use App\Sub2class;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Services\ReceiptService;

class ReceiptToPdfController extends Controller
{

    protected $receiptRepository;
    protected $receiptService;

    public function __construct(ReceiptRepository $receiptRepository, ReceiptService $receiptService)
    {
        $this->receiptRepository = $receiptRepository;
        $this->receiptService = $receiptService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $html = file_get_contents('downloads/selection.pdf');
//        $view = \View::make('test.table');
//        $html = $view->render();
//////
//        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//        $pdf::SetFont('msungstdlight');
//        $pdf::SetTitle('Hello World');
//        $pdf::AddPage();
//        $pdf::writeHTML($html, true, false, true, false, '');
//        $pdf::Output('hello_world.pdf');
        // create new PDF document

//        $view = \View::make('test.ReceiptToPdf');
//        $html = $view->render();
//        $view = \View::make('test.pdf')->with('dsad');
//        $html = $view->render();
//        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//        $pdf::AddPage();
////        $html = file_get_contents('downloads/selection.pdf');
//        $pdf::Image('downloads/0002.jpg');
//        $pdf::SetFont('msungstdlight', '', 10);
//        $pdf::SetXY(108, 68);
//        $pdf::Write(0, $html);
////        $pdf::writeHTML($html, true, 0, true, true);
//        $pdf::lastPage();
//        $pdf::Output('test.pdf');
//        $accounts = Account::all();
//        return view('test.pdf'/*, compact('accounts')*/);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $accounts = Account::all();
        $account_name = Member::join('accounts', 'members.no', '=', 'accounts.member_no')
            ->where('accounts.member_no', '>', 0)
            ->pluck('members.devotee_name', 'members.no');
//        return view('test.ReceiptToPdf', compact('account_name'));
        return view('test.select', compact('account_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Account $account
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Account $account, Request $request)
    {

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        for ($k = 1; $k <= $request['IncreaseNum']; $k++) {
            $pdf::AddPage();

            $pdf::Image('downloads/0002.jpg');

            $pdf::SetFont('msungstdlight', '', 12);
            $pdf::SetXY(145, 47);
            $pdf::Write(0, $request['account_date' . $k]);/*日期*/

            $pdf::SetFont('msungstdlight', '', 12);
            $pdf::SetXY(108, 68);
            $pdf::Write(0, $request['account_member_name' . $k]);/*會員名稱(上)*/

            $pdf::SetFont('msungstdlight', '', 12);
            $pdf::SetXY(92, 84);
            $pdf::Write(0, $request['account_total_nt' . $k]);/*NT總金額*/

            if ($request['account_cert_type' . $k] == 'C') {
                $pdf::SetFont('msungstdlight', '', 10);
                $pdf::SetXY(70.41, 93.12);
                $pdf::Write(0, '■');/*付款方式現金*/
            }
            if ($request['account_cert_type' . $k] == 'P') {
                $pdf::SetFont('msungstdlight', '', 10);
                $pdf::SetXY(81.82, 93.12);
                $pdf::Write(0, '■');/*付款方式郵局*/
            }
            if ($request['account_cert_type' . $k] == 'B') {
                $pdf::SetFont('msungstdlight', '', 10);
                $pdf::SetXY(93.24, 93.12);
                $pdf::Write(0, '■');/*付款方式銀行*/
            }
            if ($request['account_cert_type' . $k] == 'S') {
                $pdf::SetFont('msungstdlight', '', 10);
                $pdf::SetXY(104.69, 93.12);
                $pdf::Write(0, '■');/*付款方式銀行*/
            }
            if ($request['account_member_type' . $k] == 'S') {
                $pdf::SetFont('msungstdlight', '', 10);
                $pdf::SetXY(70.41, 109.32);
                $pdf::Write(0, '■');/*用途奉獻*/
            } else if ($request['account_member_type' . $k] == 'G') {
                $pdf::SetFont('msungstdlight', '', 10);
                $pdf::SetXY(80.87, 109.32);
                $pdf::Write(0, '■');/*用途贊助會員*/
            } else {
                $pdf::SetFont('msungstdlight', '', 10);
                $pdf::SetXY(98.35, 109.32);
                $pdf::Write(0, '■');/*用途其他*/
            }
            $pdf::SetFont('msungstdlight', '', 10);
            $pdf::SetXY(117.63, 258.57);
            $pdf::Write(0, $request['account_mobile' . $k]);/*手機*/

            $pdf::SetFont('msungstdlight', '', 14);
            $pdf::SetXY(65, 240.5);
            $pdf::Write(0, $request['account_address' . $k]);/*通訊地址*/

            $pdf::SetFont('msungstdlight', '', 18);
            $pdf::SetXY(87.7, 250.6);
            $pdf::Write(0, $request['account_member_name' . $k]);/*會員名稱(下)*/

            $pdf::SetFont('msungstdlight', '', 9);
            $pdf::SetXY(164, 54.15);
            $pdf::Write(0, $request['account_person' . $k]);/*會員編號(右上角)*/

            $pdf::SetFont('msungstdlight', '', 9);
            $pdf::SetXY(33.7, 253.6);
            $pdf::Write(0, $request['account_person' . $k]);/*會員編號(左下角)*/

            $pdf::SetFont('msungstdlight', '', 9);
            $pdf::SetXY(145, 54.15);
            $pdf::Write(0, $request['account_date_tw' . $k]);/*民國年*/

            $pdf::SetFont('msungstdlight', '', 9);
            $pdf::SetXY(150, 71);
            $pdf::Write(0, $request['account_monthday' . $k]);/*年份代碼*/

            $pdf::SetFont('msungstdlight', '', 14);
            $pdf::SetXY(92, 77);
            $pdf::Write(0, $request['account_total_tw' . $k]);/*中文總金額*/

            $pdf::lastPage();
        }
        $pdf::Output('test.pdf');
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
        $person=$this->receiptRepository->getPersonDetail($no);/*會員資料*/
        $receiptData = $this->receiptRepository->getReceiptDetail($no);/*奉獻資料*/
        $receiptNo = $this->receiptRepository->getReceiptNo($no);/*奉獻明細編號*/
        $medium = $this->receiptService->converter($receiptData,$person,$receiptNo);/*中介站資料轉換*/
       // $total = $this->receiptService->getAmountTotal($medium['data']);/*總金額(阿拉伯數字)*/
      //  $total_tw = $this->receiptService->NumberToChinese($total);/*總金額(國字)*/
       // dd($medium);
        return view('show.receipt', compact('person','medium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//    public function getPDF()
//    {
//        $accounts = Account::all();
//        return view('test.ReceiptToPdf', compact('accounts'));
//    }
//    public function postPDF(Request $data)
//    {
////        $view = \View::make('test.ReceiptToPdf');
////        $html = $view->render();
//        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//        $pdf::AddPage();
//        $pdf::Image('downloads/0002.jpg');
//        $pdf::SetFont('msungstdlight', '', 10);
//        $pdf::SetXY(108, 68);
//        $pdf::Write(0, $data['account_person']);
//        $pdf::lastPage();
//        $pdf::Output('test.pdf');
//
//
//    }
    public function getPdfPerson($no, Request $request)/*會員資料&帳務相關*/
    {
        $ReceiptDataPerson = Member::join('accounts', 'accounts.member_no', '=', 'members.no');/*Join 兩張表進行篩選*/
        if ($request->ajax()) {
            $pdf_person = $ReceiptDataPerson->where('members.no', $no)->get();
            return response()->json($pdf_person);
        }
    }

    public function getPdfDetail($no, Request $request)/*會員帳務明細*/
    {
        $ReceiptDataDetail = Account::join('account_classes', 'accounts.account_class_no', '=', 'account_classes.no')/*Join 兩張表進行篩選*/
        ->join('sub1classes', 'account_classes.subclass1_no', '=', 'sub1classes.no')
            ->join('sub2classes', 'account_classes.subclass2_no', '=', 'sub2classes.no');
        if ($request->ajax()) {
            $pdf_detail = $ReceiptDataDetail->where('member_no', $no)->get();
//            $pdf_detail = Account::where('member_no', $no)->get();
//            $account_class_no=Account_class::where('no',Account::where('member_no', $no)->value('account_class_no'));
//            $subclass1_name=Sub1class::where('no',$account_class_no->value('subclass1_no'))->get();
//            $subclass2_name=Sub2class::where('no',$account_class_no->value('subclass2_no'))->get();
//            $subclass1_name=Account_class::where('no',Account::where('member_no', $no)->value('account_class_no'))->get();
            return response()->json($pdf_detail);
        }
    }

}
