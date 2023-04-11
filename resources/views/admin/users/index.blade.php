@extends('layouts.app')

@section('breadcrumb')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <span>Admin</span>
            </li>
            <li class="breadcrumb-item active">
                <span>Users</span>
            </li>
        </ol>
    </nav>
</div>

@endsection

@section('content')
<div class="">
    <h1 class="mb-2">Users</h1>
    <div class="card">
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>

@endsection

@push('scripts')

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush