@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class ="col-12">
            <form action="{{ route('module.store') }}">
                @csrf

                <label for="">Title</label>
                <input type="text" name="Title" required>

                <label for="">Desc</label>
                <input type="text" name="desc" id="" required>

                <label for="">Category</label>
                <select name="Category_id" id="">
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        
                    @endforeach
                </select>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection