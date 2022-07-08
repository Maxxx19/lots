@extends('welcome')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div>
                <span class="col-12 mb-2 text-start">
                    <a type="button" href="{{ route('categories.index') }}" class="btn btn-warning btn-space">Show Categories</a>
                </span>
                <span class="col-12 mb-2 text-end">
                    <a type="button" href="{{ route('lots.create') }}" class="btn btn-primary btn-space">Create</a>
                </span>
                <span class="col-12 mb-2 ">
                    <form id="checkout-form" class="users smart-form ml-3" novalidate="novalidate" method="GET"
                        action="{{ route('lots.index') }}">
                        <div class="d-flex flex-row" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="search_category">Search Category</label>
                                <input class="form-control" type="text"
                                    @if (array_key_exists('search_category', $search)) value="{{ $search['search_category'] }}" @endif
                                    name="search_category" style="width: 50%;">

                            </div>
                        </div>
                        <button type="submit" class="btn  btn-primary" style="margin-bottom: 10px;">Search</button>
                    </form>
                </span>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lots</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @isset($lots)
                                    <tbody>
                                        @foreach ($lots as $lot)
                                            <tr>
                                                <td>{{ $lot->id }}</td>
                                                <td>{{ $lot->title }}</td>
                                                <td>{{ $lot->description }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($lot->categories as $category)
                                                            <li>
                                                                {{ $category->title }}
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                </td>
                                                <td>
                                                    <a type="button" href="{{ route('lots.edit', $lot->id) }}"
                                                        class="btn btn-success btn-space">Edit</a>

                                                    <form action="{{ route('lots.destroy', $lot->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="#" class="btn btn-danger btn-space mt-1" title="Delete"
                                                            type="button" data-toggle="tooltip"
                                                            onclick="this.closest('form').submit();return false;">
                                                            Delete
                                                        </a>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @else
                                    <tbody>
                                        <tr>
                                            <td colspan="4" text-align="center">No Lots Found.</td>
                                        </tr>
                                    </tbody>
                                @endisset
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $lots->links() }}
@endsection
