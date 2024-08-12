<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class JobCategoryController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $jobCategories = JobCategory::all();
        return view('admin.other_settings.JobNamesCategories.index',compact('jobCategories'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'name'=>'required'
            ];
            $messages = [
                'name.required'=>'   من فضلك ادخل اسم القسم   '
            ];
            $validator = Validator::make($data,$rules,$messages);
            if ($validator->fails()){
                return Redirect::back()->withInput()->withErrors($validator);
            }
            $jobCategory = new JobCategory();
            $jobCategory->name = $data['name'];
            $jobCategory->save();
            return $this->success_message(' تم اضافة التصنيف بنجاح  ');
        }
    }

    public function update(Request $request ,$id)
    {

        $jobCategory = JobCategory::findOrFail($id);

        if ($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'name'=>'required'
            ];
            $messages = [
                'name.required'=>'   من فضلك ادخل اسم القسم   '
            ];
            $validator = Validator::make($data,$rules,$messages);
            if ($validator->fails()){
                return Redirect::back()->withInput()->withErrors($validator);
            }
            $jobCategory->update([
                'name'=> $data['name'],
            ]);
            return $this->success_message(' تم  تحديث التصنيف بنجاح  ');
        }

    }

    public function delete($id)
    {
        $category = JobCategory::findOrFail($id);
        $category->delete();
        return $this->success_message(' تم حذف التصنيف بنجاح  ');
    }
}
