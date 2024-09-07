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
                        <form class="form-group d-flex gap-2" action="" method="post">
                            <input class="form-control" type="text" name="search" placeholder="Search...">
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
                            </tr>
                        </thead>
                        <tbody>
                                <tr class="text-start">
                                    <td>{{ $data['id'] }}</td>
                                    <td>
                                        <img width="100" src="{{ $_ENV['BASE_URL'] }}images/products/{{ $data['image'] }}"
                                            alt="">
                                    </td>
                                    <td>{{ $data['name'] }}</td>
                                    <td>{{ $data['catalogue_name'] }}</td>
                                    <td>{{ number_format($data['price']) }} VND</td> 
                                    <td>{{ $data['description'] }}</td>
                                </tr>
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
