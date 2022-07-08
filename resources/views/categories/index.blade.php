@extends('welcome')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-12 mb-2 text-end">
                <a type="button" href="{{ route('categories.create') }}" class="btn btn-primary btn-space">Create</a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Categories</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @isset($categories)
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->title }}</td>
                                                <td>
                                                    <a type="button" href="{{ route('categories.edit', $category->id) }}"
                                                        class="btn btn-success btn-space">Edit</a>

                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
                                            <td colspan="4" text-align="center">No Categories Found.</td>
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
    {{ $categories->links() }}
@endsection
