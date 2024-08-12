<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\JobCategory;
use App\Models\admin\Jobsname;
use Illuminate\Http\Request;

class JobsNameController extends Controller
{
    use Message_Trait;
    public function index()
    {
        $alljobs  = Jobsname::with('Category')->get();
        $JobCategories = JobCategory::all();
        return view('admin.other_settings.JobsNames.index',compact('alljobs','JobCategories'));
    }
    public function add(Request $request)
    {
        if ($request->isMethod('post')){
            $data = $request->all();
           $jobtitles = explode(',',$data['titles']);
            foreach ($jobtitles as $title){
                $namejob = new Jobsname();
                $namejob->create([
                    'title'=>$title,
                    'cat_id'=>$data['cat_id'],
                ]);
            }
            return $this->success_message(' تمت الاضافة بنجاح  ');
        }
    }
    public function update(Request $request,$id)
    {
        $jobname = Jobsname::findOrFail($id);
        if ($request->isMethod('post')){
            $data = $request->all();
           // dd($data);
            $jobname->update([
                'title'=>$data['title'],
                'cat_id'=>$data['cat_id'],
            ]);
            return $this->success_message(' تم التعديل بنجاح  ');
        }
    }

    public function delete($id)
    {
        $jobname = Jobsname::findOrFail($id);
        $jobname->delete();
        return $this->success_message(' تم الحذف بنجاح  ');
    }
}
