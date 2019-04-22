<?php

namespace App\Http\Controllers\Backend;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:manage_users']);
    }

    public function index()
    {
        $roles = Role::all();

        return view('backend.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get()->pluck('name', 'name');

        return view('backend.roles.create', compact('permissions'));
    }

    public function store(StoreRolesRequest $request)
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);

        return redirect()->route('admin.roles.index');
    }

    public function edit($id)
    {
        $permissions = Permission::get()->pluck('name', 'name');

        $role = Role::findOrFail($id);

        return view('backend.roles.edit', compact('role', 'permissions'));
    }

    public function update(UpdateRolesRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('admin.roles.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles.index');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
