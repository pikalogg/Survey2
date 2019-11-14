@extends('layouts.admin', ['bt1' => 'active', 'commemt' => 'Quản lý người dùng'])


@section('title')
    admin-user
@endsection
@section('content')
    @include('admin/modules.user')
@endsection
