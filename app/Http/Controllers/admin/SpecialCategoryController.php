<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\JobCategory;
use App\Models\admin\SpecialCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SpecialCategoryController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $SpecialCategories = SpecialCategory::all();
        return view('admin.other_settings.SpecialNamesCategories.index',compact('SpecialCategories'));
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
            $speicalCategory = new SpecialCategory();
            $speicalCategory->name = $data['name'];
            $speicalCategory->save();
            return $this->success_message(' تم اضافة التصنيف بنجاح  ');
        }
    }

    public function update(Request $request ,$id)
    {

        $specialCategory = SpecialCategory::findOrFail($id);

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
            $specialCategory->update([
                'name'=> $data['name'],
            ]);
            return $this->success_message(' تم  تحديث التصنيف بنجاح  ');
        }

    }

    public function delete($id)
    {
        $category = SpecialCategory::findOrFail($id);
        $category->delete();
        return $this->success_message(' تم حذف التصنيف بنجاح  ');
    }
}
