@extends('layouts.app')

@section('breadcrumb')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.posts.index') }}">Posts</a>
            </li>
            <li class="breadcrumb-item active">
                <span>Edit</span>
            </li>
        </ol>
    </nav>
</div>

@endsection

@section('content')

<h2 class="mb-2">Edit Post</h2>
<div class="col-xxl-8 mb-4">
    <div class="card">
        <div class="card-body p-4">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" class="">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label mb-1">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title )}}">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label mb-1">Content</label>
                    <textarea name="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror" id='content'>{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-success">
                    <svg class="icon me-1">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-save') }}"></use>
                    </svg>
                    {{ __('Save') }}
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush