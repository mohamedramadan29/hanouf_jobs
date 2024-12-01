<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Blog;
use App\Models\admin\BlogCategory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;

    public function index()
    {
        $blogs = Blog::all();
        return view('admin.Blogs.index', compact('blogs'));
    }


    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'name' => 'required',
                    'content' => 'required',
                    'image' => 'required|image'
                ];
                $messages = [
                    'name.required' => ' من فضلك ادخل الاسم   ',
                    'content.required' => ' من فضلك ادخل الوصف    ',
                    'image.required' => ' من فضلك ادخل صورة القسم  ',

                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Blogs'));
                }
                $blog = new Blog();
                $blog->create([
                    'name' => $data['name'],
                    'slug' => $this->CustomeSlug($data['name']),
                    'short_desc' => $data['short_desc'],
                    'desc' => $data['content'],
                    // 'meta_title'=>$data['meta_title'],
                    // 'meta_description'=>$data['meta_description'],
                    'meta_keywords' => $data['meta_keywords'],
                    'image' => $file_name
                ]);
                return $this->success_message(' تم اضافة المقال  بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.Blogs.add');
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'name' => 'required',
                    'content' => 'required',
                ];
                $messages = [
                    'name.required' => ' من فضلك ادخل العنوان  ',
                    'content.required' => ' من فضلك ادخل الوصف    ',
                ];


                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Blogs'));

                    ////// / Delete Old Image

                    $old_image = public_path('assets/uploads/Blogs/' . $blog['image']);
                    if (file_exists($old_image)) {
                        @unlink($old_image);
                    }
                    $blog->update([
                        'image' => $file_name,
                    ]);
                }

                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                $blog->update([
                    'name' => $data['name'],
                    'slug' => $this->CustomeSlug($data['name']),
                    'short_desc' => $data['short_desc'],
                    'desc' => $data['content'],
                    // 'meta_title'=>$data['meta_title'],
                    // 'meta_description'=>$data['meta_description'],
                    'meta_keywords' => $data['meta_keywords'],

                ]);
                return $this->success_message(' تم تعديل القسم  بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.Blogs.update', compact('blog'));
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $old_image = public_path('assets/uploads/Blogs/' . $blog['image']);
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $blog->delete();
        return $this->success_message(' تم حذف المقال بنجاح ');
    }
}
