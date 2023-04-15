<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PermissionDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(PermissionDataTable $dataTable){
        return $dataTable->render('admin.permissions.index');
    }
}
