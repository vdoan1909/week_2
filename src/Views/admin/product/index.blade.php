@extends('admin.layouts.master')

@section('title')
    @parent
    List Products
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Products</h4>

                <a href="{{ $_ENV['BASE_URL'] }}admin/product/create" class="btn btn-primary">Create a new product</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">List Products</h5>

                    <div>
                        <form class="form-group d-flex gap-2" action="{{$_ENV['BASE_URL']}}admin/product/search" method="GET">
                            <input class="form-control" type="text" name="search" placeholder="Search..." value="{{isset($_GET['search']) ? $_GET['search'] : ''}}">
                            <button class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Catalogue</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th width="10px">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="text-start">
                                    <td>{{ $item['id'] }}</td>
                                    <td>
                                        <img width="100" src="{{ $_ENV['BASE_URL'] }}images/products/{{ $item['image'] }}"
                                            alt="">
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>
                                        <a href="{{$_ENV['BASE_URL']}}admin/product/searchByCatalogue/{{$item['catalogue_id']}}">{{ $item['catalogue_name'] }}</a>
                                    </td>
                                    <td>{{ number_format($item['price']) }} VND</td>
                                    <td>{{ $item['description'] }}</td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="{{ $_ENV['BASE_URL'] }}admin/product/show/{{ $item['id'] }}"
                                                        class="dropdown-item edit-item-btn">
                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Show
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ $_ENV['BASE_URL'] }}admin/product/edit/{{ $item['id'] }}"
                                                        class="dropdown-item edit-item-btn">
                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form
                                                        action="{{ $_ENV['BASE_URL'] }}admin/product/delete/{{ $item['id'] }}"
                                                        method="POST">
                                                        <button type="submit" class="dropdown-item remove-item-btn"
                                                            onclick="return confirm('Bạn có chắc không?')">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if (isset($_SESSION['success']) && isset($_GET['msg']))
        <div style="position: fixed; bottom: 1rem; right: 1rem; z-index: 999;">
            <div id="borderedToast2" class="toast toast-border-success overflow-hidden mt-3 fade show" role="alert"
                aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-2">
                            <i class="ri-checkbox-circle-fill align-middle"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0"> {{ $_SESSION['success'] }} </h6>
                        </div>
                        <button type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @php
        unset($_SESSION['success']);
    @endphp
@endsection
