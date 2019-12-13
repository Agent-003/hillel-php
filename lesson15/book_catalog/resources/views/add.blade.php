@extends('layout')
@section('content')
    <form action="{{ route('book_save') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" id="title" name="title" type="text"/>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input class="form-control" id="author" name="author" type="text"/>
        </div>
        <div class="form-group">
            <label for="annotation">Annotation</label>
            <textarea class="form-control" id="annotation" name="annotations"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
