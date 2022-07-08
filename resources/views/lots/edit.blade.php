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
                    Edit Lot
                </div>
                <div class="card-body">
                    <form name="add-form" method="post" action="{{ route('lots.update', $lot->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="form-group col-6 mb-1">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" value="{{ $lot->title }}"
                                    class="form-control" required="">
                                <span class="text-danger" id="titleError"></span>
                            </div>
                            <div class="form-group col-6 mb-1">
                                <label for="description">Description</label>
                                <input type="text" id="description" name="description" value="{{ $lot->description }}"
                                    class="form-control" required="">
                                <span class="text-danger" id="descriptionError"></span>
                            </div>
                            <div>
                                <strong>Category:</strong>
                                <select class="form-control" id="select2_lots" multiple name="category[]">
                                    @foreach ($categories as $category)
                                        @foreach ($lot->categories as $data)
                                            @if ($data->title == $category->title)
                                                <option value="{{ $category->id }}" selected>{{ $category->title }}
                                                </option>
                                            @endif
                                      
                                    @endforeach

                                    <option value="{{ $category->id }}">{{ $category->title }}
                                    </option>
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
