@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Cập nhật bài viết</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.article.index') }}"> Article</a></li>
            <li class="active"> Update</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            @include('admin.article.form_edit')
        </div>
    </section>
    <!-- /.content -->
@endsection



