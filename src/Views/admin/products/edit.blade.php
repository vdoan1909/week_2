@extends('admin.layouts.master')

@section('title')
    @parent

    Edit Product
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><b>Edit Product:</b> {{ $data['name'] }}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Information</h4>
                </div>

                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <form class="row mt-3" action="{{ $_ENV['BASE_URL'] }}admin/product/update/{{ $data['id'] }}"
                                method="POST" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <label for="catalogue_id" class="form-label">Select Catalogue</label>
                                        <select class="form-select" id="catalogue_id" name="catalogue_id">
                                            @foreach ($catalogues as $catalogue)
                                                <option value="{{ $catalogue['id'] }}" @selected($catalogue['id'] == $data['catalogue_id'])>
                                                    {{ $catalogue['name'] }}</option>
                                            @endforeach
                                        </select>

                                        @if (isset($_SESSION['errors']['catalogue_id']))
                                            @foreach ($_SESSION['errors']['catalogue_id'] as $error)
                                                <p class="text-danger">
                                                    {{ $error }}
                                                </p>
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $data['name'] }}">

                                        @if (isset($_SESSION['errors']['name']))
                                            @foreach ($_SESSION['errors']['name'] as $error)
                                                <p class="text-danger">
                                                    {{ $error }}
                                                </p>
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="price" name="price"
                                            value="{{ $data['price'] }}">

                                        @if (isset($_SESSION['errors']['price']))
                                            @foreach ($_SESSION['errors']['price'] as $error)
                                                <p class="text-danger">
                                                    {{ $error }}
                                                </p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3">{{ $data['description'] }}</textarea>

                                        @if (isset($_SESSION['errors']['description']))
                                            @foreach ($_SESSION['errors']['description'] as $error)
                                                <p class="text-danger">
                                                    {{ $error }}
                                                </p>
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input class="form-control" type="file" id="image" name="image">

                                        @if (isset($_SESSION['errors']['image']))
                                            @foreach ($_SESSION['errors']['image'] as $error)
                                                <p class="text-danger">
                                                    {{ $error }}
                                                </p>
                                            @endforeach
                                        @endif
                                        <hr>
                                        <img width="100"
                                            src="{{ $_ENV['BASE_URL'] }}assets/images/products/{{ $data['image'] }}"
                                            alt="">
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <button class="btn btn-primary" type="submit">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
