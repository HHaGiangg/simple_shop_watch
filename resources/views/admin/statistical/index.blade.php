@extends('layouts.app_master_admin')
@section('content')
    <section class="content-header">
        <h1>Quản lý thống kê</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-pricetag-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số sản phẩm</span>
                        <span class="info-box-number">{{ $totalProducts }}<small><a href="{{ route('admin.product.index') }}"> Chi tiết </a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số thành viên</span>
                        <span class="info-box-number">{{ $totalUsers }}<small><a href="{{ route('admin.user.index') }}"> Chi tiết </a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số đơn hàng</span>
                        <span class="info-box-number">{{ $totalTransactions }}<small><a href="{{ route('admin.transaction.index') }}"> Chi tiết </a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-albums-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Bài viết</span>
                        <span class="info-box-number">{{ $totalArticles }}<small><a href="{{ route('admin.article.index') }}"> Chi tiết </a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row" style="margin-bottom: 15px">
            <div class="col-sm-8">
                <figure class="highcharts-figure">
                    <div id="container2"></div>

                </figure>
            </div>
            <div class="col-sm-4">
                <figure class="highcharts-figure">
                    <div id="container" data-json="{{ $statusTransactions }}"></div>

                </figure>

            </div>
        </div>
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách đơn hàng mới</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Info</th>
                                    <th>Account</th>
                                    <th>Status</th>
                                    <th>Money</th>
                                    <th>Times</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <ul>
                                                <li>Name: {{ $item->tst_name }}</li>
                                                <li>Email: {{ $item->tst_email }}</li>
                                                <li>Phone: {{ $item->tst_phone }}</li>
                                            </ul>
                                        </td>
                                        <td>
                                            @if($item->tst_user_id)
                                                <span class="label label-success">Thành viên</span>
                                            @else
                                                <span class="label label-default">Khách</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class=" label label-{{ $item->getStatus($item->tst_status)['class'] }}">
                                                {{ $item->getStatus($item->tst_status)['name'] }}
                                            </span>
                                        </td>
                                        <td>{{ number_format($item->tst_total_money,0,',','.') }} Đ</td>
                                        <td>{{ $item->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Danh sách đơn hàng</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-4">
                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sản phẩm bán chạy nhất</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($topPayproducts as $item)
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ pare_url_file($item->pro_avatar) }}" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <span class="product-description">{{ $item->pro_name }}</span>
                                    <a href="javascript:void(0)" class="product-title">{{ $item->pro_pay }} Lượt mua
                                        <span class="label label-warning pull-right">{{ number_format($item->pro_price,0,',','.') }} Đ</span></a>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.box-footer -->

                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-4">
                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sản phẩm được xem nhiều nhất</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($topViewproducts as $item)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{ pare_url_file($item->pro_avatar) }}" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <span class="product-description">{{ $item->pro_name }}</span>
                                        <a href="javascript:void(0)" class="product-title">{{ $item->pro_view }} <i class="fa fa-eye"></i>
                                            <span class="label label-warning pull-right">{{ number_format($item->pro_price,0,',','.') }} Đ</span></a>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.box-footer -->

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('script')
    <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
{{--    <script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
{{--    <script src="https://code.highcharts.com/modules/export-data.js"></script>--}}
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        let dataTransactions = $("#container").attr('data-json');
        dataTransactions = JSON.parse(dataTransactions)

        Highcharts.chart('container', {

            chart: {
                styledMode: true
            },

            title: {
                text: 'Thống kê trạng thái đơn hàng'
            },

            xAxis: {
                categories: ['Jan', 'Feb', 'Mar','Apr']
            },

            series: [{
                type: 'pie',
                allowPointSelect: true,
                keys: ['name', 'y', 'selected', 'sliced'],
                data: dataTransactions,
                showInLegend: true
            }]
        });
        Highcharts.chart('container2', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Biểu đồ doanh thu các ngày trong tháng'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Temperature'
                },
                labels: {
                    formatter: function () {
                        return this.value + '°';
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Tokyo',
                marker: {
                    symbol: 'square'
                },
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, {
                    y: 26.5,
                    marker: {
                        symbol: 'url(https://www.highcharts.com/samples/graphics/sun.png)'
                    }
                }, 23.3, 18.3, 13.9, 9.6]

            }, {
                name: 'London',
                marker: {
                    symbol: 'diamond'
                },
                data: [{
                    y: 3.9,
                    marker: {
                        symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
                    }
                }, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        });
    </script>
@endsection
