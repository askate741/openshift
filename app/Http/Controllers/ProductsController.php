<?php

namespace App\Http\Controllers;

use App\Church;
use App\Credit_card;
use App\Http\Requests\Product_orderRequest;
use App\Product_order;
use App\Member;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $where = 'product_order'; /*在 tcrm.home 新增 */
        /*在 tcrm.product_order  if*/
        $pages = 'show'; /*在 tcrm.home 分頁 */
        $names = 'product_orders';
        $update = 'show';/*在 tcrm.home 上傳 */

        $tabs = Product_order::all();
        $huge = Product_order::where('quantity', '>', 0)->orderBy('no', 'desc');/*數量大於0*/
        $tiny = Product_order::where('quantity', '<', 0)->orderBy('no', 'desc');/*數量小於0*/

        return view('tcrm.product_order', compact('tabs', 'where', 'pages', 'perPage', 'update', 'names', 'huge', 'tiny'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     * @internal param Product_orderRequest $request
     */
    public function create()
    {
        $where = 'create';

        $members = Member::pluck('devotee_name', 'no');
        $products = Product::pluck('product_name', 'no');
        $churches = Church::pluck('church_name', 'no');
        if (Church::all()->last() == null) {
            $last = 0;
        } else {
            $last = Church::all()->last()->no;
        }
        if (Member::all()->last() == null) {
            $member_last = 0;
        } else {
            $member_last = Member::all()->last()->no;
        }
        if (Product::all()->last() == null) {
            $product_last = 0;
        } else {
            $product_last = Product::all()->last()->no;
        }

        return view('pages.product_wizard', compact('where', 'members', 'products', 'churches', 'product_last', 'member_last', 'last', 'm_last'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Product_orderRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product_orderRequest $request)
    {
        if ($request['birthday'] == null) {
            $request['birthday'] = null;
        }
        if ($request['date_out'] == null) {
            $request['date_out'] = null;
        }
        if ($request['product_flow'] == 1) {/*如果是出貨，而且要新增會員*/
            if ($request['devotee_name'] != null) {
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
            }
            $request['quantity'] = -$request['quantity'];

        } else {/*如果是進貨*/
            if ($request['product_name'] != null) {/*如果有新增產品*/
                $request['original_price'] = $request['actual_price'];
                Product::create($request->all());
            }
        }
        Product_order::create($request->all());
        return redirect('product_order');
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
        /*在 tcrm.product_order  elseif*/
        $update = 'show';
        /*在 tcrm.home 上傳 */
        $names = 'product_orders';
        $pages = '';
        $product_order = Product_order::findOrFail($no);
        $data_no = json_encode(Product_order::pluck('no')->toArray());
        return view('show.product_order', compact('where', 'product_order', 'pages', 'update', 'names','data_no'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $no
     * @return \Illuminate\Http\Response
     * @internal param Product_orderRequest $request
     * @internal param int $id
     */
    public function edit($no)
    {
        $where = 'edit';
        $product_last = "";
        $member_last = "";
        $last = "";
        $members = Member::pluck('devotee_name', 'no');
        $products = Product::pluck('product_name', 'no');
        $quantity = Product_order::all();
        $inventory = array();
        foreach ($quantity as $quantities) {
            $inventory[] = $quantities->quantity;
        }
        $inventory = array_sum($inventory);
        $product_order = Product_order::findOrFail($no);

        return view('forms.product_order', compact('where', 'product_order', 'churches', 'where', 'churches', 'members', 'products', 'inventory', 'product_last', 'member_last', 'last'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $no
     * @param Product_orderRequest|Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update($no, Product_orderRequest $request)
    {
        if ($request['product_flow'] == 1) {
            $request['quantity'] = -$request['quantity'];
        }
        $product_order = Product_order::findOrFail($no);
        $product_order->update($request->all());
        return redirect('product_order');
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
        $product_order = Product_order::findOrFail($no);
        $product_order->delete();
        return redirect('product_order');
    }
    public function delete($no)/*在首頁進行刪除*/
    {
        Product_order::find($no)->delete();
        return  redirect('product_order');
    }

    public function export()
    {
        $export = Product_order::select('*')->get();
        Excel::create('產品訂單表', function ($excel) use ($export) {
            $excel->sheet('product_order', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }

    public function p_export()
    {
        $export = Product::select('*')->get();
        Excel::create('產品表', function ($excel) use ($export) {
            $excel->sheet('product', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }

    public function getImport()
    {
        $where = 'product_order';
        /*在 tcrm.home 新增 */
        /*在 tcrm.product_order  if*/
        $pages = 'show';
        /*在 tcrm.home 分頁 */
        $update = 'update';
        /*在 tcrm.home 上傳 */
        $tabs = Product_order::all();
        $huge = Product_order::where('quantity', '>', 0)->orderBy('no', 'desc');/*數量大於0*/
        $tiny = Product_order::where('quantity', '<', 0)->orderBy('no', 'desc');/*數量小於0*/
        return view('tcrm.product_order', compact('tabs', 'where', 'pages', 'perPage', 'update', 'huge', 'tiny'));
    }

    public function postImport()
    {
        $where = 'product_order';
        /*在 tcrm.home 新增 */
        /*在 tcrm.product_order  if*/
        $pages = 'show';
        /*在 tcrm.home 分頁 */
        $update = 'update';
        /*在 tcrm.home 上傳 */
        $tabs = Product_order::all();
        $huge = Product_order::where('quantity', '>', 0)->orderBy('no', 'desc');/*數量大於0*/
        $tiny = Product_order::where('quantity', '<', 0)->orderBy('no', 'desc');/*數量小於0*/
        Excel::load(Input::file('p_file'), function ($reader) {
            foreach ($reader->toArray() as $row) {
                Product::firstOrCreate($row);
            }
        });
        Excel::load(Input::file('file'), function ($reader) {
            foreach ($reader->toArray() as $row) {
                Product_order::firstOrCreate($row);
            }
        });
        return view('pages.OK', compact('tabs', 'where', 'pages', 'perPage', 'update', 'huge', 'tiny'));
    }


    public function getProduct($no, Request $request)
    {
        if ($request->ajax()) {
            $product_orders = Product_order::where('product_no', $no)->get();
            $product_original = Product::where('no', $no)->value('original_price');
            return response()->json([$product_orders, $product_original]);
        }

    }
//    public function getOriginal($no, Request $request)
//    {
//        if ($request->ajax()) {
//
//            return response()->json($product_original);
//        }
//
//    }
}
