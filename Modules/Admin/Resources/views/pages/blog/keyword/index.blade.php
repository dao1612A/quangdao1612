@extends('admin::layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Keyword</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ index</span>
                </div>
            </div>
            <div class="d-flex my-xl-auto right-content">
                <div class="pr-1 mb-3 mb-xl-0">
                    <a href="{{ route('get_admin.keyword.create') }}" class="btn btn-info  mr-2">Thêm mới <i class="la la-plus-circle"></i></a>
                </div>
            </div>
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
                                        <th>Name</th>
                                        <th style="width: 40%">SEO</th>
                                        <th>Sort</th>
                                        <th>Status</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($keywords as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->k_name }}</td>
                                            <td>
                                                <div class="existed-seo-meta">
                                                    <span class="page-title-seo title_seo">{{ $item->k_title_seo }}</span>
                                                    <div class="page-url-seo ws-nm">
                                                        <p><span class="slug">{{ $item->k_slug }}</span></p>
                                                    </div>
                                                    <div class="ws-nm">
                                                        <span style="color: #70757a;">{{ $item->created_at }} - </span>
                                                        <span class="page-description-seo description_seo">{{ $item->k_description_seo }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-info">{{ $item->k_sort }}</span>
                                            </td>
                                            <td>
                                                <span class="badge {{ $item->getStatus($item->k_status)['class']  }}">{{ $item->getStatus($item->k_status)['name']  }}</span>
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a href="{{ route('get_admin.keyword.edit', $item->id) }}" class="btn btn-xs btn-info"><i class="la la-edit"></i></a>
                                                <a href="{{ route('get_admin.keyword.delete', $item->id) }}" class="btn btn-xs js-delete btn-danger"><i class="la la-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>Dữ liệu chưa được cập nhật</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>
@stop
