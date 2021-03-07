@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới thuộc tính</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.attribute.index') }}"> Attribue</a></li>
            <li class="active"> Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="post">
                        @csrf
                        <div class="col-sm-8">
                            <div class="from-group {{ $errors->first('atb_name') ? 'has-error':''  }} ">
                                <label for="name">Name <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="atb_name" placeholder="Name...">
                                @if($errors->first('atb_name'))
                                    <span class="text-danger">{{ $errors->first('atb_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <form-group {{ $errors->first('atb_type') ? 'has-error':''  }}>
                                <label for="name">Group <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="atb_type" id="">
                                    <option value="">-- Chọn nhóm thuộc tính --</option>
                                    <option value="1"> Đôi</option>
                                    <option value="2"> Năng lượng</option>
                                    <option value="3"> Loại dây</option>
                                    <option value="4"> Loại vỏ</option>
                                </select>
                                @if($errors->first('atb_type'))
                                    <span class="text-danger">{{ $errors->first('atb_type') }}</span>
                                @endif
                            </form-group>
                        </div>
                            <div class="col-sm-8">
                            <form-group {{ $errors->first('atb_category_id') ? 'has-error':''  }} >
                                <label for="name">Category<span class="text-danger">(*)</span></label>
                                <select class="form-control" name="atb_category_id" id="">
                                    <option value="">-- Chọn danh mục --</option>
                                    @foreach($categories as $item)
                                    <option value=""> {{ $item -> c_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('atb_category_id'))
                                    <span class="text-danger">{{ $errors->first('atb_category_id') }}</span>
                                @endif
                            </form-group>
                        </div>

                        <!-- /.box-body -->
                        <div class="col-sm-12">
                            <div class="box-footer text-center" style="margin-top: 20px">
                                <a href="{{ route('admin.attribute.index') }}" class="btn btn-danger">Quay lại <i
                                        class="fa fa-undo"></i> </a>
                                <button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-save"></i>
                                </button>
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


