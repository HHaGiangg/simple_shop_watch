<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestCategory;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\AdminProductRequest;
use Illuminate\Support\Str;


class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        //. Loc tim kiem sp trong admin
        $products = Product::with('category:id,c_name');
        //1. loc theo id
        if ( $id = $request->id) $products->where('id', $id);
        //2. loc theo ten
        if ($name = $request->name) $products->where('pro_name','like','%'.$name.'%');
        //.3 Loc theo danh muc sp(Hang sp)
        if ($category = $request->category) $products->where('pro_category_id',$category);

        $products = $products->orderByDesc('id')->paginate(10);
        $categories = Category::all();
        $viewData =[
            'products'  => $products,
            'categories' => $categories,
            'query'      => $request->query()
        ];
        return view('admin.product.index', $viewData);
    }
    public function create()
    {
        $categories = Category::all();

        $attributeOld =[];
        $keywordOld =[];
        $attributes = $this-> AttributeGroup();
        $keywords = Keyword::all();
        return view('admin.product.create', compact('categories','attributeOld','attributes','keywords','keywordOld'));
    }
    public function store(AdminProductRequest $request)
    {
        $data = $request->except('_token','pro_avatar','attribute','keywords','file');
        $data['pro_slug']     = Str::slug($request->pro_name);
        $data['created_at']   = Carbon::now();

        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1)
                $data['pro_avatar'] = $image['name'];
        }

        $id = Product::insertGetId($data);
        if ($id)
        {
            $this ->synAtrribute($request->attribute, $id);
            $this ->synKeyword($request->keywords, $id);
            if ($request->file){
                $this -> synAdlbumImageProduct($request->file,$id);
            }
        }
        return redirect()->back();
    }
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $attributes = $this-> AttributeGroup();
        $keywords = Keyword::all();
        $attributeOld = \DB::table('product_attribute')
            ->where('pa_product_id', $id)
            ->pluck('pa_attribute_id')
            ->toArray();
        $keywordOld = \DB::table('products_keywords')
            ->where('pk_product_id', $id)
            ->pluck('pk_keyword_id')
            ->toArray();


        if (!$attributeOld)  $attributeOld =[];
        if (!$keywordOld)       $keywordOld =[];

        $images = \DB::table('product_images')->where('pi_product_id', $id)->get();

        $viewData = [
            'images' => $images ?? []
        ];

        return view('admin.product.update', compact('categories', 'product', 'attributes','attributeOld','keywords','keywordOld'),$viewData);
    }
    public function update(AdminProductRequest $request, $id)
    {
        $product           = Product::find($id);
        $data               = $request->except('_token','pro_avatar','attribute','keywords','file');
        $data['pro_slug']     = Str::slug($request->pro_name);
        $data['updated_at'] = Carbon::now();

        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1)
                $data['pro_avatar'] = $image['name'];
        }

        $update = $product->update($data);
       if ($update){
           $this ->synAtrribute($request->attribute, $id);
           $this ->synKeyword($request->keywords, $id);

           // kiem tra
           if ($request->file){
                $this -> synAdlbumImageProduct($request->file,$id);
           }
       }
        return redirect()->back();
    }
    //Ham uplaod anh chi tiet san pham
    public function synAdlbumImageProduct($files, $productID)
    {
        foreach ($files as $key => $fileImage){
            //lay duoi dinh dang file upload
            $ext = $fileImage->getClientOriginalExtension();
            $extend = [
                'png', 'jpg','jpeg','PNG','JPG',
            ];
            if (!in_array($ext, $extend)) return false;
            $filename = date('Y-m-d__').Str::slug($fileImage->getClientOriginalName()).'.'.$ext;
            $path = public_path().'/uploads/'.date('Y/m/d');
            if (!\File::exists($path)){
                mkdir($path,0777, true);
            }

            $fileImage->move($path, $filename);
            \DB::table('product_images')
                ->insert([
                   'pi_image'  => $fileImage->getClientOriginalName(),
                    'pi_slug' => $filename,
                    'pi_product_id' => $productID,
                    'created_at' => Carbon::now()

                ]);
        }
    }

    public function active($id)
    {
        $product = Product::find($id);
//        chuyen doi trang thai cua no (0-1)
        $product ->pro_active = ! $product ->pro_active ;
        $product ->save();

        return redirect()->back();
    }
    private function synKeyword($keywords, $idProduct)
    {
        if (!empty($keywords)){
            $datas = [];
            foreach ($keywords as $key => $keyword){
                $datas[] =[
                    'pk_product_id' => $idProduct,
                    'pk_keyword_id' => $keyword
                ];
            }
            if (!empty($datas)) {
                \DB::table('products_keywords')->where('pk_product_id', $idProduct)->delete();
                \DB::table('products_keywords')->insert($datas);
            }
        }
    }
    public function hot($id)
    {
        $product = Product::find($id);
        $product ->pro_hot = ! $product ->pro_hot;
        $product ->save();

        return redirect()->back();
    }
    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) $product->delete();

        return redirect()->back();
    }

    public function deleteImage($imageID)
    {
        \DB::table('product_images')->where('id', $imageID)->delete();
        return redirect()->back();
    }


    protected function synAtrribute($attributes, $idProduct)
    {
        if (!empty($attributes)){
            $datas = [];
            foreach ($attributes as $key => $value){
                $datas[] =[
                    'pa_product_id' => $idProduct,
                    'pa_attribute_id' => $value
                ];
            }
            if (!empty($datas)){
                \DB::table('product_attribute')->where('pa_product_id', $idProduct)->delete();
                \DB::table('product_attribute')->insert($datas);
            }
        }
    }
    public function AttributeGroup()
    {
        $attributes = Attribute::get();
        $groupAttribute = [];
        foreach ($attributes as $key =>$attribute){
            $key = $attribute->gettype($attribute->atb_type)['name'];
            $groupAttribute[$key][] = $attribute->toArray();
        }
        return $groupAttribute;
    }
}
