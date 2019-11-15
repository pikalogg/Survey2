@extends('layouts.admin', ['bt2' => 'active', 'commemt' => 'Quản lý biểu mẫu'])


@section('title')
    admin-topic
@endsection
@section('content')
    @include('admin/modules.topic')
@endsection
