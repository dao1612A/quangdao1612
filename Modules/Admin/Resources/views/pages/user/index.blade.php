@extends('admin::layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">User</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ index</span>
                </div>
            </div>
{{--            <div class="d-flex my-xl-auto right-content">--}}
{{--                <div class="pr-1 mb-3 mb-xl-0">--}}
{{--                    <a href="{{ route('get_admin.tag.create') }}" class="btn btn-info  mr-2">Thêm mới <i class="la la-plus-circle"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <!-- breadcrumb -->
        <!-- row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mg-b-0 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Social</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>
                                            @if($item->avatar)
                                                <a href="">
                                                    <img src="{{ pare_url_file($item->avatar) }}" style="width: 60px;height: 60px;border-radius: 50%;" alt="">
                                                </a>
                                            @else
                                                <a href="">
                                                    <img src="{{ asset('images/icon/account-circle.svg') }}" alt="" style="width: 60px;height: 60px;border-radius: 50%;">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <span>{{ $item->name }}</span><br>
                                        </td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            <span>{{ $item->provider }}</span><br>
                                            <span>{{ $item->provider_id }}</span><br>
                                        </td>
                                        <td>
                                            <a href="{{ route('get_admin.user.edit', $item->id) }}" class="btn btn-xs btn-info"><i class="la la-edit"></i></a>
                                            <a href="{{ route('get_admin.user.delete', $item->id) }}" class="btn btn-xs btn-danger js-delete"><i class="la la-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{ $users->links('vendor/pagination/default') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>
@stop
