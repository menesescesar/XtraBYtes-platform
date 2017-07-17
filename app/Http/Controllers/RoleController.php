<?php

namespace App\Http\Controllers;

use App\Authorizable;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use Authorizable;

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('role.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:roles']);

        if( Role::create($request->only('name')) ) {
            alert()->success('Success', trans('admin.role_added'))->autoclose(3000);
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        if($role = Role::findOrFail($id)) {
            // admin role has everything
            if($role->name === 'Admin') {
                $role->syncPermissions(Permission::all());
                return redirect()->route('roles.index');
            }

            $permissions = $request->get('permissions', []);

            $role->syncPermissions($permissions);

            alert()->success('Success',  $role->name .' '. trans('admin.permissions_updated'))->autoclose(3000);
        } else {
            alert()->error('Error',  $role->name .' '. trans('admin.role_not_found'))->autoclose(3000);
        }

        return redirect()->route('roles.index');
    }
}
