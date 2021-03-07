<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestSlide;
use Illuminate\Support\Str;


class AdminSlideController extends Controller
{
    public function index()
    {
        $slides = Slide::paginate(20);
        return view('admin.slide.index', compact('slides'));
    }
    public function create()
    {
        return view('admin.slide.create');
    }
    public function store(AdminRequestSlide $request)
    {
        $data = $request->except('_token','sd_image');
        $data['created_at'] = Carbon::now();

        if ($request->sd_image) {
            $image = upload_image('sd_image');
            if ($image['code'] == 1)
                $data['sd_image'] = $image['name'];
        }
        $id = Slide::insertGetId($data);
        return redirect()->back();
    }
    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.update', compact('slide'));
    }
    public function update(AdminRequestSlide $request, $id)
    {
        $slide = Slide::find($id);
        $data = $request->except('_token','sd_image');
        $data['created_at'] = Carbon::now();

        if ($request->sd_image) {
            $image = upload_image('sd_image');
            if ($image['code'] == 1)
                $data['sd_image'] = $image['name'];
        }
        $update = $slide->update($data);
        return redirect()->back();
    }
    public function active($id)
    {
        $slide = Slide::find($id);
//        chuyen doi trang thai cua no (0-1)
        $slide ->sd_active = ! $slide ->sd_active ;
        $slide ->save();

        return redirect()->back();
    }
    public function delete($id)
    {
        $slide = Slide::find($id);
        if ($slide) $slide->delete();

        return redirect()->back();
    }
}
