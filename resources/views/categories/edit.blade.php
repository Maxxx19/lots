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
                    Edit Category
                </div>
                <div class="card-body">
                    <form name="add-form" method="post" action="{{ route('categories.update', $category->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="form-group col-6 mb-1">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" value="{{ $category->title }}"
                                    class="form-control" required="">
                                <span class="text-danger" id="titleError"></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
