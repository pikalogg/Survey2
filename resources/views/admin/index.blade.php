@extends('layouts.admin', ['bt1' => 'active', 'commemt' => 'Quản lý người dùng'])


@section('title')
    pika
@endsection
@section('content')
    @include('admin/modules.user')
@endsection
