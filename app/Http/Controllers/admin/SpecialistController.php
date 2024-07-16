<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Jobsname;
use App\Models\admin\Specialist;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $allspecialists = Specialist::all();
        return view('admin.other_settings.SpecialistNames.index', compact('allspecialists'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $special = new Specialist();
            $special->create([
                'name' => $data['title'],
                'status' => $data['status'],
            ]);
            return $this->success_message(' تمت الاضافة بنجاح  ');
        }
    }

    public function update(Request $request, $id)
    {
        $specialname = Specialist::findOrFail($id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $specialname->update([
                'name' => $data['title'],
                'status' => $data['status']
            ]);
            return $this->success_message(' تم التعديل بنجاح  ');
        }
    }

    public function delete($id)
    {
        $specialname = Specialist::findOrFail($id);
        $specialname->delete();
        return $this->success_message(' تم الحذف بنجاح  ');
    }
}
