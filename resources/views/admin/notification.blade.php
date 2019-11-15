@extends('layouts.admin', ['bt5' => 'active', 'commemt' => 'Quản lý thông báo'])


@section('title')
    admin-notifi
@endsection
@section('content')
    @include('admin/modules.notification')
@endsection
