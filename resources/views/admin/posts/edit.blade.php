@extends('layouts.app')

@section('content')
<form action="{{route('admin.posts.update', $post->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="post_author">Author</label>
        <input  type="text" class="form-control" name="post_author" value="{{$post->post_author}}">
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $post->title}}">
    </div>
    <div class="form-group">
        <label class="d-block" for="content">Content</label>
        <textarea  name="content" cols="80" rows="" >{{ $post->content }}</textarea>
    </div>
    <div class="form-group col-md-2">
        <label for="post_date">Date</label>
        <input  type="date" class="form-control" name="post_date" value="{{ $post->post_date}}">
    </div>
    <div class="form-group">
        <label>Tags</label>
        @foreach($tags as $tag)
            
            <div class="form-check">
                <input class="form-check-input" name="tags[]" type="checkbox" 
                value="{{$tag->id }}" id="{{$tag->slug}}" {{ ($post->tags->contains($tag)) ? 'checked' : ""}} >
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
    <button type="submit" class="btn btn-primary">Salva</button>
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


        