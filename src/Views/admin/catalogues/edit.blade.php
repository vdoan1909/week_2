@extends('admin.layouts.master')

@section('title')
    @parent

    Edit Catalogue {{ $data['name'] }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><b>Edit Catalogue:</b> {{ $data['name'] }}</h4>
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
                            <form class="col-xxl-6 col-md-6"
                                action="{{ $_ENV['BASE_URL'] }}admin/catalogue/update/{{ $data['id'] }}" method="POST">

                                <div>
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $data['name'] }}">
                                    @if (isset($_SESSION['errors']['name']))
                                        <p class="text-danger">
                                            @foreach ($_SESSION['errors']['name'] as $error)
                                                {{ $error }}
                                            @endforeach
                                        </p>
                                    @endif
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
