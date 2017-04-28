<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2017/1/9
 * Time: 下午 09:45
 */

namespace App\Http\Controllers;

use App\Course_registration;
use App\Course;
use App\Course_type;
use App\Member;
use App\Church;
use App\Credit_card;
use App\Http\Requests\Course_registrationsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class CourseRegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $where = 'course_registration';  /*在 tcrm.course_registration 新增 */ /*在 tcrm.course_registration 下載的網址 */
        $pages = 'show';    /*在 tcrm.course_registration 分頁 */
        $names = 'courses_registration';/*上傳的網址*/
        $update = 'show';   /*在 tcrm.button 往上傳網站 */
        $tabs = Course_registration::all();
        return view('tcrm.course_registration', compact('tabs', 'where', 'pages', 'perPage', 'update', 'names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $where = 'create';/*在 tcrm.course_registration 新增 */
        $members = Member::pluck('devotee_name', 'no');/*可顯示能選擇的會員名稱*/
        if (Member::all()->last() == null) {
            $member_last = 0;
        } else {
            $member_last = Member::all()->last()->no;
        }

        $types = Course_type::pluck('course_type_name', 'no');/*可顯示能選擇的課程分類*/
//        if (Course_type::all()->last() == null) {
//            $course_last = 0;
//        } else {
//            $course_last = Course_type::all()->last()->no;
//        }
        $churches = Church::pluck('church_name', 'no');
        if (Church::all()->last() == null) {
            $last = 0;
        } else {
            $last = Church::all()->last()->no;
        }
        return view('pages.registration_wizard', compact('where', 'members', 'member_last', 'churches', /*'course_last',*/
            'types', 'last'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Course_registrationsRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course_registrationsRequest $request)
    {
        if ($request['birthday'] == null) {
            $request['birthday'] = null;
        }
        if ($request['date_out'] == null) {
            $request['date_out'] = null;
        }
        if ($request['devotee_name'] == null and $request['course_type_name'] == null) {
            Course_registration::create($request->all());
        } elseif ($request['devotee_name'] == null) {
            Course_type::create($request->all());
            Course_registration::create($request->all());
        } elseif ($request['course_type_name'] == null) {
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
            Course_registration::create($request->all());
        } else {
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
            Course_type::create($request->all());
            Course_registration::create($request->all());
        }

        return redirect('course_registration');
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
        $where = 'show'; /*在 tcrm.course_registration 新增 */ /*在 tcrm.course_registration 下載的網址 */
        $update = 'show';   /*在 tcrm.button 往上傳網站 */
        $names = 'courses_registrations';/*tcrm.button  上傳的網址*/
        $pages = '';    /*在 tcrm.button 分頁 */
        $course_registration = Course_registration::findOrFail($no);
        $data_no = json_encode(Course_registration::pluck('no')->toArray());
        return view('show.course_registration', compact('course_registration', 'data_no', 'where', 'pages', 'update', 'names'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $no
     * @return \Illuminate\Http\Response
     * @internal param Course_registrationsRequest $request
     * @internal param int $id
     */
    public function edit($no)
    {
        $where = 'edit';
        $members = Member::pluck('devotee_name', 'no');
        $types = Course_type::pluck('course_type_name', 'no');/*可顯示能選擇的課程分類*/
        $courses = Course::where('course_type_no', Course_registration::where('no', $no)->value('course_type_no'))
            ->pluck('course_name', 'no');/*可顯示能選擇的課程名稱*/
        $course_registration = Course_registration::findOrFail($no);
        return view('forms.course_registration', compact('where', 'course_registration', 'members', 'types', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $no
     * @param Course_registrationsRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update($no, Course_registrationsRequest $request)
    {
        $course_registration = Course_registration::findOrFail($no);
        $course_registration->update($request->all());
        return redirect('course_registration');
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
        $course_registration = Course_registration::findOrFail($no);
        $course_registration->delete();
        return redirect('course_registration');
    }

    public function delete($no)/*在首頁進行刪除*/
    {
        Course_registration::find($no)->delete();
        return redirect('course_registration');
    }


    public function export()
    {
        $export = Course_registration::select('*')->get();
        Excel::create('修課紀錄表', function ($excel) use ($export) {
            $excel->sheet('course_registration', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }

    public function getImport()
    {
        $where = 'course_registration';/*在 tcrm.course_registration 新增 */ /*在 tcrm.course_registration 下載的網址 */
        $pages = 'show';/*在 tcrm.button 分頁 */
        $update = 'update'; /*在 tcrm.button 上傳 */
        $tabs = Course_registration::all();
        return view('tcrm.course_registration', compact('tabs', 'where', 'pages', 'perPage', 'update'));
    }

    public function postImport()
    {
        $where = 'course_registration';/*在 tcrm.course_registration 新增 */ /*在 tcrm.course_registration 下載的網址 */
        $pages = 'show';/*在 tcrm.button 分頁 */
        $update = 'update'; /*在 tcrm.button 上傳 */
        $tabs = Course_registration::all();
        Excel::load(Input::file('file'), function ($reader) {
            foreach ($reader->toArray() as $row) {
                Course_registration::firstOrCreate($row);
            }
        });
        return view('pages.OK', compact('tabs', 'where', 'pages', 'perPage', 'update'));
    }

    public function getCourse_registration($no, Request $request)
    {
        if ($request->ajax()) {
            $course_registrations = Course::course_name($no);
            return response()->json($course_registrations);
        }
    }
}