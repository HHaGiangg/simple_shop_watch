@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới danh mục sản phẩm</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.category.index') }}"> Category</a></li>
            <li class="active"> Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-8">
                                 <div class="from-group {{ $errors->first('c_name') ? 'has-error':''  }} " >
                                     <label for="name">Name <span class="text-danger">(*)</span></label>
                                     <input type="text" class="form-control" name="c_name"  placeholder="Name...">
                                     @if($errors->first('c_name'))
                                         <span class="text-danger">{{ $errors->first('c_name') }}</span>
                                     @endif
                                 </div>
                            </div>
                            <div class="col-sm-4">
                                <h3 class="box-title"> Ảnh Thương hiệu sản phẩm </h3>
                                <div class="box-body block-images">
                                    <div style="margin-bottom: 10px"><img src="{{ pare_url_file($category -> c_avatar ?? '')  }}" onerror="this.onerror=null;" alt=" " class="img-thumbnail" style="width: 200px;height: 200px;" ></div>
                                    <div style="position: relative;"><a class="btn btn-primary" href="javascript:;">Choose File...<input id="js-upload" type="file" style="position:absolute;
                z-index: 2;top: 0;left: 0;filter: alpha(opacity=0);-ms-filter:&quot; progid:DXImage Transform.Microsoft.Alpha(Opacticy=0)&quot;
                ;opacity:0; background-color:transparent;color: transparent;" name="c_avatar" size="40" class="js-upload"></a>&nbsp;<span class="label label-info" id="upload-file-info"></span>
                                    </div>
                                </div>
                            </div>

                                  <!-- /.box-body -->
                            <div class="col-sm-12">
                                <div class="box-footer text-center">
                                    <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Quay lại <i class="fa fa-undo"></i> </a>
                                    <button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-save"></i> </button>
                                </div>
                            </div>
                        </form>


                    <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
        </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


