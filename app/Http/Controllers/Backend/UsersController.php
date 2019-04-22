<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:manage_users']);
    }

    public function index()
    {
        $users = User::all();

        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get()->pluck('name', 'name');

        return view('backend.users.create', compact('roles'));
    }

    public function store(StoreUsersRequest $request)
    {
        $user = User::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('admin.users.index');
    }


    public function edit($id)
    {
        $roles = Role::get()->pluck('name', 'name');

        $user = User::findOrFail($id);

        return view('backend.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUsersRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
