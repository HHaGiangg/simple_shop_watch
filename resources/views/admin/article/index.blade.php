@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý bài viết</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.article.index') }}"> Article</a></li>
            <li class="active"> List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{ route('admin.article.create') }}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i> </a></h3>
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
                                <th>Nội dung</th>
                                <th>Avatar</th>
                                <th>Hot</th>
                                <th>Status</th>
                                <th>Times</th>
                                <th>Action</th>
                            </tr>
                            </tbody>
                            @if(isset($articles))
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{ $article->id }}</td>
                                        <td>{{ $article->a_name }}</td>
                                        <td>
                                            <span class="label label-success">{{ $article->menu->mn_name ?? "[N/A]" }}</span>
                                        </td>
                                        <td>
                                            <img src="{{ pare_url_file($article -> a_avatar) }}" alt="" style="width: 80px; height: 80px">
                                        </td>
                                        <td>
                                            @if($article -> a_hot ==1)
                                                <a href="{{ route('admin.article.hot', $article->id) }}" class="label label-info">Hot</a>
                                            @else
                                                <a href="{{ route('admin.article.hot', $article->id) }}" class="label label-default">None</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($article -> a_active ==1)
                                                <a href="{{ route('admin.article.active', $article->id) }}" class="label label-info">Active</a>
                                            @else
                                                <a href="{{ route('admin.article.active', $article->id) }}" class="label label-default">Hide</a>
                                            @endif
                                        </td>
                                        <td>{{ $article->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.article.update', $article->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('admin.article.delete', $article->id) }}" class="js-delete-confirm btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                {!! $articles->links()!!}
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection


