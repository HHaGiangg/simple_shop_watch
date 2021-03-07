<?php

namespace App\Http\Controllers\Admin;


//use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;



class AdminCategoryController extends AdminController
{
    //Hien thi danh muc san pham
    public function index()
    {
        $categories = Category::paginate(10);
        $viewData =[
            'categories' => $categories
        ];
        return view('admin.category.index', $viewData);
    }

//    them moi danh muc san pham
    public function create()
    {
        return view('admin.category.create');
    }

//    Luu danh muc san pham sau khi them moi
    public function store(AdminRequestCategory $request)
    {
        $data = $request->except('_token');
        $data['c_slug'] = Str::slug($request->c_name);
        $data['created_at'] = Carbon::now();

        $id = Category::insertGetId($data);
        if ($request->c_avatar) {
            $image = upload_image('c_avatar');
            if ($image['code'] == 1)
                $data['c_avatar'] = $image['name'];
        }
        return redirect()->back();
    }

//    edit danh muc san pham
    public function edit($id)
    {
        $category = Category::find($id); //Tro toi id can sua
        return view('admin.category.update', compact('category'));
    }

    //    Update danh muc san pham sau khi sua
    public function update(AdminRequestCategory $request, $id)
    {
        $category = Category::find($id);
        $data = $request->except('_token');
        $data['c_slug'] = Str::slug($request->c_name);
        $data['updated_at'] = Carbon::now();

        if ($request->c_avatar) {
            $image = upload_image('c_avatar');
            if ($image['code'] == 1)
                $data['c_avatar'] = $image['name'];
        }
        $category ->update($data);
        return redirect()->back();
    }

//    Xoa danh muc
    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) $category->delete();

        return redirect()->back();
    }

//    active danh muc san pham
    public function active($id)
    {
//        lay cate can chinh sua theo id
        $category = Category::find($id);
//        chuyen doi trang thai cua no (0-1)
        $category ->c_status = ! $category ->c_status;
        $category ->save();

        return redirect()->back();
    }

//    active hot
    public function hot($id)
    {
        $category = Category::find($id);
        $category ->c_hot = ! $category ->c_hot;
        $category ->save();

        return redirect()->back();
    }

}
