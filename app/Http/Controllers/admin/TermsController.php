<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Terms;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    use Message_Trait;
    public function update(Request $request)
    {
        $term_data = Terms::orderby('id','desc')->first();

        if ($request->isMethod('post')){
            $data = $request->all();
            $term_data->update([
                'term_title'=>$data['title'],
                'terms'=>$data['description']
            ]);
            return $this->success_message(' تم التعديل بنجاح  ');
        }

        return view('admin.terms',compact('term_data'));
    }
}
