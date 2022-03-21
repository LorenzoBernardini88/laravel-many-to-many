@extends('layouts.app')

@section('content')
<form action="{{route('admin.posts.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="post_author">Author</label>
        <input value="{{old('post_author')?? $post->post_author}}"type="text" class="form-control" name="post_author" placeholder="...">
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input value="{{old('title')?? $post->title}}"  type="text" class="form-control" name="title" placeholder="...">
    </div>
    <div class="form-group">
        <label class="d-block" for="content">Content</label>
        <textarea value="{{old('content')?? $post->content}}" name="content" cols="80" rows="" placeholder="..."></textarea>
    </div>
    <div class="form-group col-md-2">
        <label for="post_date">Date</label>
        <input value="{{old('post_date')?? $post->post_date}}" type="date" class="form-control" name="post_date">
    </div>
    <div class="form-group">
        <label>Tags</label>
        @foreach($tags as $tag)
            
            <div class="form-check">
                <input class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->id }}" id="{{$tag->slug}}">
                <label class="form-check-label" for="{{$tag->slug}}">
                    {{$tag->name}}
                </label>
            </div>

        @endforeach
    </div>
    <div class="form-group col-md-2">
        <label>Categoria</label>
        <select name="category_id"
                class="form-controll @error('category_id') is-invalid @enderror">
            <option value=""> -- seleziona categoria -- </option>
            @foreach($categories as $category )
                <option value="{{$category->id}}"
                    {{$category->id == old('category_id',$post->category_id)? 'selected': ''}}>
                    {{$category->name}}
                </option>
            @endforeach
        </select>
        @error('category_id')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Crea</button>
</form>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection