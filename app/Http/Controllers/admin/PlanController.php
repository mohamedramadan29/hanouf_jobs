<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    public function store(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $rules = [
                    'name' => 'required',
                    'price' => 'required|numeric',
                    'timeslot' => 'required|numeric',
                    'status' => 'required'
                ];
                $messages = [
                    'name.required' => 'من فضلك ادخل عنوان الخطة ',
                    'price.required' => 'من فضلك ادخل سعر الخطة ',
                    'price.numeric' => 'السعر يجب ان يكون رقم صحيح ',
                    'timeslot.required' => 'من فضلك ادخل الفترة الزمنية',
                    'timeslot.numeric' => 'يجب ادخال رقم صحيح في الفترة',
                    'status.required' => 'من فضلك ادخل حالة الخطة',
                    'advantage.required' => 'من فضلك ادخل مميزات الخطة '
                ];
                $this->validate($request, $rules, $messages);
                $plan = new Plan();
                $plan->create([
                    'name' => $data['name'],
                    'price' => $data['price'],
                    'timeslot' => $data['timeslot'],
                    'advantage' => $data['advantage'],
                    'status' => $data['status'],
                ]);
                return $this->success_message('تم اضافة خطة جديدة بنجاح ');
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

        return view('admin.plans.store');
    }

    public function update(Request $request, $id)
    {
        $plan = Plan::find($id);

        try {

            if ($request->isMethod('post')) {
                $data = $request->all();
                $rules = [
                    'name' => 'required',
                    'price' => 'required|numeric',
                    'timeslot' => 'required|numeric',
                    'status' => 'required'
                ];
                $messages = [
                    'name.required' => 'من فضلك ادخل عنوان الخطة ',
                    'price.required' => 'من فضلك ادخل سعر الخطة ',
                    'price.numeric' => 'السعر يجب ان يكون رقم صحيح ',
                    'timeslot.required' => 'من فضلك ادخل الفترة الزمنية',
                    'timeslot.numeric' => 'يجب ادخال رقم صحيح في الفترة',
                    'status.required' => 'من فضلك ادخل حالة الخطة',
                    'advantage.required' => 'من فضلك ادخل مميزات الخطة '
                ];
                $this->validate($request, $rules, $messages);
                $plan->update([
                    'name' => $data['name'],
                    'price' => $data['price'],
                    'timeslot' => $data['timeslot'],
                    'advantage' => $data['advantage'],
                    'status' => $data['status'],
                ]);
                return $this->success_message('تم تعديل الخطة بنجاح ');
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

        return view('admin.plans.update', compact('plan'));
    }

    public function delete($id)
    {
        try {
            $plan = Plan::find($id);
            $plan->delete();
            return $this->success_message('تم حذف الخطة بنجاح ');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

    }
}
