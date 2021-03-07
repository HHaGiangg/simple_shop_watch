<form  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-8">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail">Name</label>
{{--                    dung old() giu lại gtri trên form input--}}
                    <input type="text" class="form-control" name="pro_name" placeholder="Đồng hồ..." autocomplete="off" value="{{ $product -> pro_name ?? old('pro_name') }}">
                    @if($errors->first('pro_name'))
                        <span class="text-danger">{{ $errors->first('pro_name') }}</span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail">Giá sản phẩm</label>
                            <input type="text" class="form-control" name="pro_price" placeholder="15.000.000" autocomplete="off" value="{{ $product -> pro_price ?? old('pro_price') }}">
                            @if($errors->first('pro_price'))
                                <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail">Giảm giá</label>
                            <input type="number" class="form-control" name="pro_sale" placeholder="5" data-type="currency" value="{{ $product -> pro_sale ?? old('pro_sale',0) }}">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="tag" >Keyword <b class="col-red" style="color: red">(*)</b></label>
                            <select name="keywords[]" class="form-control js-select2-keyword" multiple="">
                                <option value="">_Click_</option>
                                @foreach($keywords as $keyword)
                                    <option value="{{ $keyword->id }}" {{in_array($keyword->id, $keywordOld) ? "selected='selected'" : ''}}>{{ $keyword->k_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail">Description</label>
                    <textarea name="pro_description" class="form-control" cols="5" rows="2" autocomplete="off">{{ $product -> pro_description ?? old('pro_description') }}</textarea>
                    @if($errors->first('pro_description'))
                        <span class="text-danger">{{ $errors->first('pro_description') }}</span>
                    @endif
                    <div class="form-group">
                        <label class="control-label">Danh mục <b class="col-red" style="color: red">(*)</b></label>
                        <select name="pro_category_id" class="form-control ">
                            <option value="">_Click_</option>
                            @foreach($categories  as $category )
                                <option value="{{ $category->id }}" {{ ($product->pro_category_id ?? 0 ==  $category->id) ? "selected='selected'" : ''}}>
                                    {{ $category->c_name }}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->first('pro_category_id'))
                            <span class="text-danger">{{ $errors->first('pro_category_id') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Thuộc tính</h3>
                        <div class="box-body">
                            @foreach($attributes as $key => $attribute)
                                <div class="form-group col-sm-3">
                                    <h4 style="border-bottom: 1px solid #dedede; padding-bottom: 10px;">{{ $key }}</h4>
                                    @foreach($attribute as $item)
                                    <div class="checkbox"><label>
                                            <input type="checkbox" name="attribute[]" {{in_array($item['id'], $attributeOld) ? "checked" : ''}}
                                                   value="{{ $item['id'] }}">{{ $item['atb_name'] }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    <hr>
                    <div class="box-header with-border">
                        <h3 class="box-title"> Album ảnh</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="file-loading">
                                <input id="images" type="file" name="file[]" multiple class="file" >
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                      <div class="form-group col-sm-3">
                          <label for="exampleInputEmail">Xuất xứ</label>
                          <select name="pro_country" class="form-control ">
                              <option value="0">_Click_</option>
                              <option value="1" {{ ($product -> pro_country ?? '') == 1 ? "selected='selected'": "" }}>Anh</option>
                              <option value="2" {{ ($product -> pro_country ?? '') == 2 ? "selected='selected'": "" }}>Thụy Sỹ</option>
                              <option value="3" {{ ($product -> pro_country ?? '') == 3 ? "selected='selected'": "" }}>Nhật Bản</option>
                              <option value="4" {{ ($product -> pro_country ?? '') == 4 ? "selected='selected'": "" }}>Mỹ</option>
                          </select>
                      </div>
                        <div class="form-group col-sm-3">
                            <label>Năng lượng</label>
                            <input type="text" class="form-control" name="pro_energy" value="{{ $product -> pro_energy ?? ''}}" placeholder="Năng lượng">
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Độ chịu nước</label>
                            <input type="text" class="form-control" name="pro_resistant" value="{{ $product -> pro_resistant ?? ''}}" placeholder="Độ chịu nước">
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Số lượng</label>
                            <input type="number" class="form-control" name="pro_number" value="{{ $product -> pro_number ??  old('pro_number',0)}}" placeholder="10">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Nội dung</h3>
                </div>
            </div>
            <div class="box-body">
{{--                @if($images)--}}
{{--                    {{ dd($images) }}--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-2"></div>--}}
{{--                </div>--}}
{{--                @endif--}}
                <div class="form-group">
                    <label for="exampleInputEmail">Content</label>
                    <textarea name="pro_content" id="content" class="form-control textarea" cols="5" rows="2">{{ $product->pro_content ?? '' }}</textarea>
                    @if($errors->first('pro_content'))
                        <span class="text-danger">{{ $errors->first('pro_content') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title"> Ảnh đại diện</h3>
            </div>
            <div class="box-body block-images">
                <div style="margin-bottom: 10px"><img src="{{ pare_url_file($product -> pro_avatar ?? '')  }}" onerror="this.onerror=null;" alt=" " class="img-thumbnail" style="width: 200px;height: 200px;" ></div>
                <div style="position: relative;"><a class="btn btn-primary" href="javascript:;">Choose File...<input id="js-upload" type="file" style="position:absolute;
                z-index: 2;top: 0;left: 0;filter: alpha(opacity=0);-ms-filter:&quot; progid:DXImage Transform.Microsoft.Alpha(Opacticy=0)&quot;
                ;opacity:0; background-color:transparent;color: transparent;" name="pro_avatar" size="40" class="js-upload"></a>&nbsp;<span class="label label-info" id="upload-file-info"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 clearfix">
        <div class="box-footer text-center">
            <a href="{{ route('admin.product.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i>Cannel</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>{{ isset($product )? "Cập nhật":"Thêm mới" }}</button>
        </div>
    </div>
</form>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/themes/fas/theme.min.js"></script>

