@extends('layouts.app')

@section('breadcrumb')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <span>Admin</span>
            </li>
            <li class="breadcrumb-item active">
                <span>Permissions</span>
            </li>
        </ol>
    </nav>
</div>

@endsection

@section('content')
<div class="">
    <div class="mb-2 d-flex justify-content-between">
        <h2 class="m-0 align-self-end">Permissions</h2>
    </div>
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