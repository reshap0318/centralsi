<?php

namespace App\Http\Controllers\Backend;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionsRequest;
use App\Http\Requests\Admin\UpdatePermissionsRequest;

class PermissionsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:manage_users']);
    }

    public function index()
    {
        $permissions = Permission::all();

        return view('backend.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('backend.permissions.create');
    }

    public function store(StorePermissionsRequest $request)
    {
        Permission::create($request->all());

        return redirect()->route('admin.permissions.index');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('backend.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionsRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update($request->all());

        return redirect()->route('admin.permissions.index');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('admin.permissions.index');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Permission::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
