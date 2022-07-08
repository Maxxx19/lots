@extends('welcome')

@section('content')

    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Add Category
            </div>
            <div class="card-body">
                @error('title')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
                <form name="add-form" action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6 mb-1">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" required="">
                            <span class="text-danger" id="titleError"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
