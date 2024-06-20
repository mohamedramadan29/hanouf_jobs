<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    use Message_Trait;
    use Slug_Trait;
    use Upload_Images;


    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                dd($data);
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('admin.users.store');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                dd($data);
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('admin.users.update', compact('user'));
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return $this->success_message(' تم حذف المستخدم  ');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
    }
}
