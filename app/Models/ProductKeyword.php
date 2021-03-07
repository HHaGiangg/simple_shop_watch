<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductKeyword extends Model
{
//    use HasFactory;
    protected $guarded = ['']; //khong bao ve truong nao
    protected $table = 'products_keywords';
}
