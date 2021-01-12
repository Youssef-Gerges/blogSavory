
@extends('layouts.admin_layout')
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-block">
            <div class="table-responsive">
                <a href="{{ route('categories.create') }}">
                <button class="btn btn-block btn-primary">
                    Add Category
                </button>
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category name</th>
                            <th>Posts number</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cats as $i => $cat)

                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td><a href="{{ route('category', ['cat'=> $cat->id]) }}">{{ $cat->cat_name }}</a></td>
                            <td>{{ $cat->posts->count() }}</td>

                            <td><a href="{{ route('categories.edit', ['category'=> $cat->id]) }}"><button class="btn btn-info">Edit</button></a></td>

                            <td>
                                <form action="{{ route('categories.destroy', ['category'=> $cat->id]) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
