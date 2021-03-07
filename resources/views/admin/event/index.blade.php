@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý event</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.event.index') }}"> Event</a></li>
            <li class="active"> List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{ route('admin.event.create') }}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i> </a></h3>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="box-body no-padding">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Banner</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                            @if(isset($events))
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{ $event->id }}</td>
                                        <td>{{ $event->e_name }}</td>
                                        <td>{{ $event->e_link}}</td>
                                        <td>
                                            <img src="{{ pare_url_file($event -> e_banner) }}" alt="" style="width: 150px; height: 50px">
                                        </td>
                                        <td>{{ $event->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.event.update', $event->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('admin.event.delete', $event->id) }}" class="js-delete-confirm btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                {{--                {!! $slides ->links()!!}--}}
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection


