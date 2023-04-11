@extends('layouts.app')

@section('breadcrumb')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <span>Admin</span>
            </li>
            <li class="breadcrumb-item active">
                <span>Tasks</span>
            </li>
        </ol>
    </nav>
</div>

@endsection

@section('content')

<div class="">
    <div class="mb-2 d-flex justify-content-between">
        <h2 class="m-0 align-self-end">Tasks</h2>
        <a href="{{route('admin.tasks.create')}}" class="btn btn-primary btn-lg rounded-1 text-white">
            <i class="bi bi-plus-lg"></i> Create Task
        </a>
    </div>
    <table class="table mb-3 border border-1 bg-white">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td>{{$task->user->name}}</td>
                    <td>{{substr($task->title, 0, 20) . '...'}}</td>
                    <td>{{substr($task->content, 0, 50) . '...'}}</td>
                    <td>{{$task->created_at->format('d-m-Y')}}</td>
                    <td>
                        <a class="btn btn-success btn-sm text-white me-1" href="{{route('admin.tasks.edit', $task->id)}}"><i class='bi bi-pencil-fill'></i></a>
                        <button class="btn btn-danger btn-sm text-white delete-confirmation" data-id="{{ $task->id }}" type="button" data-bs-toggle="modal" data-bs-target="#delete-confirmation"><i class='bi bi-trash3-fill'></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
    <div class="d-flex">
        <div class="ms-auto">
            {!! $tasks->links() !!}
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="delete-confirmation" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5">Delete confirmation</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">
                <form action="" class="d-inline" method="POST" id="delete-form">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger delete-record">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>

    $(document).on('click','.delete-confirmation',function(){
        let id;
        let action = "{{route('admin.tasks.destroy', ':id')}}";
        id = $(this).attr('data-id');
        action = action.replace(':id', id);
        $('#delete-form').attr('action', action);
    }); 

</script>

@endpush