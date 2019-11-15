@extends('layouts.admin', ['bt3' => 'active', 'commemt' => 'Quản lý phản hồi'])


@section('title')
    admin-respondent
@endsection
@section('content')
    @include('admin/modules.respondent')
@endsection
