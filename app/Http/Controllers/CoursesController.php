<?php

namespace App\Http\Controllers;

use App\Church;
use App\Course_type;
use App\Member;
use App\Course;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $where = 'course';  /*在 tcrm.course 新增 */ /*在 tcrm.course 下載的網址 */
        $pages = 'show';    /*在 tcrm.course 分頁 */
        $names = 'courses';/*上傳的網址*/
        $update = 'show';   /*在 tcrm.button 往上傳網站 */
        $tabs = Course::all();
        return view('tcrm.course', compact('tabs', 'where', 'pages', 'perPage', 'update', 'names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $where = 'create';/*在 tcrm.course 新增 */
        $churches_no = Church::pluck('church_name', 'no');/*可顯示能選擇的主辦單位*/
        if (Church::all()->last() == null) {
            $last = 0;
        } else {
            $last = Church::all()->last()->no;
        }
        $type = Course_type::pluck('course_type_name', 'no');/*可顯示能選擇的課程分類*/
        if (Course_type::all()->last() == null) {
            $course_last = 0;
        } else {
            $course_last = Course_type::all()->last()->no;
        }
        $member = Member::where('member_type', 'C')->pluck('devotee_name', 'no');
        return view('pages.course_wizard', compact('where', 'churches_no', 'last', 'type', 'course_last', 'member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {

        if ($request['course_type_name'] == null and $request['church_name'] == null) {/*''是資料庫*/
            Course::create($request->all());

        } elseif ($request['church_name'] == null) {
            if($request['course_type_name'] == null){
                Course::create($request->all());
            }else{
                Course_type::create($request->all());
                Course::create($request->all());
            }
        } elseif ($request['course_type_name'] == null) {
            Church::create($request->all());
            Course::create($request->all());
        } else {
            Church::create($request->all());
            Course_type::create($request->all());
            Course::create($request->all());
        }
        return redirect('course');
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
        $where = 'show'; /*在 tcrm.course 新增 */ /*在 tcrm.course 下載的網址 */
        $update = 'show';   /*在 tcrm.button 往上傳網站 */
        $names = 'courses';/*tcrm.button  上傳的網址*/
        $pages = '';    /*在 tcrm.button 分頁 */
        $course = Course::findOrFail($no);
        $data_no = json_encode(Course::pluck('no')->toArray());
        return view('show.course', compact('course', 'data_no','where', 'pages', 'update', 'names'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $no
     * @param CourseRequest $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($no, CourseRequest $request)
    {
        $where = 'edit';
        $type = Course_type::pluck('course_type_name', 'no');/*可顯示能選擇的課程分類*/
        $churches_no = Church::pluck('church_name', 'no');/*可顯示能選擇的主辦單位*/
        $member = Member::where('member_type', 'C')->pluck('devotee_name', 'no');
        $course = Course::findOrFail($no);
        $course->update($request->all());
        return view('forms.course', compact('where', 'course', 'member', 'churches_no', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $no
     * @param CourseRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update($no, CourseRequest $request)
    {
        $course = Course::findOrFail($no);
        $course->update($request->all());
        return redirect('course');
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
        $course = Course::findOrFail($no);
        $course->delete();
        return redirect('course');
    }
    public function delete($no)/*在首頁進行刪除*/
    {
        Course::find($no)->delete();
        return  redirect('course');
    }

    public function export()
    {
        $export = Course::select('*')->get();
        Excel::create('課程表', function ($excel) use ($export) {
            $excel->sheet('course', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }

    public function getImport()
    {
        $where = 'course';/*在 tcrm.course 新增 */ /*在 tcrm.course 下載的網址 */
        $pages = 'show';/*在 tcrm.button 分頁 */
        $update = 'update'; /*在 tcrm.button 上傳 */
        $tabs = Course::all();
        return view('tcrm.course', compact('tabs', 'where', 'pages', 'perPage', 'update'));
    }

    public function postImport()
    {
        $where = 'course';/*在 tcrm.course 新增 */ /*在 tcrm.course 下載的網址 */
        $pages = 'show';/*在 tcrm.button 分頁 */
        $update = 'update'; /*在 tcrm.button 上傳 */
        $tabs = Course::all();
        Excel::load(Input::file('file'), function ($reader) {
            foreach ($reader->toArray() as $row) {
                Course::firstOrCreate($row);
            }
        });
        return view('pages.OK', compact('tabs', 'where', 'pages', 'perPage', 'update'));
    }

}
