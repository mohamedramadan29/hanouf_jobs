<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Jobsname;
use Illuminate\Http\Request;

class JobsNameController extends Controller
{
    use Message_Trait;
    public function index()
    {
        $alljobs  = Jobsname::all();
        return view('admin.other_settings.JobsNames.index',compact('alljobs'));
    }
    public function add(Request $request)
    {
        if ($request->isMethod('post')){
            $data = $request->all();
           // dd($data);
            $namejob = new Jobsname();
            $namejob->create([
                'title'=>$data['title'],
                'status'=>$data['status'],
            ]);
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
                'status'=>$data['status']
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
