<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;


class Product extends Model
{
    use HasFactory;

    protected $guarded = ['']; //khong bao ve truong nao

    public $country = [
//            "0" =>"[N\A]",
            "1" =>"Anh",
            "2" =>"Thụy sỹ",
            "3" =>"Nhật Bản",
            "4" =>"Mỹ"
    ];


    public function getCountry()
    {
        return Arr::get($this->country, $this->pro_country, "[N\A]");
    }
    public function category()
    {
        return $this ->belongsTo(Category::class, 'pro_category_id');
    }
    public function keywords()
    {
        return $this ->belongsToMany(Keyword::class, 'products_keywords','pk_product_id','pk_keyword_id');
    }
    public function attributes()
    {
        return $this ->belongsToMany(Attribute::class, 'product_attribute','pa_product_id','pa_attribute_id');
    }
    public function favourite()
    {
        return $this ->belongsToMany(User::class, 'user_favourite','uf_product_id','uf_user_id');
    }
}
