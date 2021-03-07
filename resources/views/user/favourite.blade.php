@extends('layouts.app_master_uer')
@section('content')
    <section class="py-lg-5" style="background: white; padding: 20px">
        <h4>Danh sách sản phẩm yêu thích </h4>
        <div class="row mb-5">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <th>{{$item->pro_name}}</th>
                            <th><span class="label label-success">{{ $item->category->c_name ?? "[N/A]" }}</span></th>
                            <th><img src="{{ pare_url_file($item -> pro_avatar) }}" alt="" style="width: 80px; height: 80px"></th>
                            <th>{{ number_format($item->pro_price,0,',','.') }} Đ</th>
                            <th><a href="">Hủy bỏ</a></th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
