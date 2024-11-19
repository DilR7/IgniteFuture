@extends('admin.layouts.admin')

@section('title', 'Users')

@section('content')   
<div class="row">
    <div class="col-12">
        <a href="{{ route('create') }}" class="btn btn-primary">Add New Module</a>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Desc</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            @foreach ($modules as $m)
                <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->name }}</td>
                    <td>{{ $m->desc }}</td>
                    <td>{{ $m->category->name}}</td>
                    <td>
                        <a href="" class="btn btn-warning">Edit</a>
                        <form action="" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
