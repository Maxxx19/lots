@extends('welcome')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    Add Lot
                </div>
                <div class="card-body">
                    <form name="add-form" id="add-form" action="{{ route('lots.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6 mb-1">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control" required="">
                                <span class="text-danger" id="titleError"></span>
                            </div>
                            <div class="form-group col-6 mb-1">
                                <label for="description">Description</label>
                                <input type="text" id="description" name="description" class="form-control"
                                    required="">
                                <span class="text-danger" id="descriptionError"></span>
                            </div>
                            <div>
                                <strong>Category:</strong>
                                <select class="form-control" id="select2_lots" multiple name="category[]">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
