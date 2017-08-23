<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Permission;
use App\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use Illuminate\Support\Facades\Hash;
use Storage;

class UserController extends Controller
{
    use Authorizable;

    public function index()
    {
        $result = User::latest()->paginate();

        return view('user.index', compact('result'));
    }

    public function create()
    {
        $roles = Role::all('name', 'id');

        return view('user.new', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'bail|required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);

        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);

        // Create the user
        if ( $user = User::create($request->except('roles', 'permissions')) ) {

            $this->syncPermissions($request, $user);


            alert()->success('Success', trans('auth.user_created'))->autoclose(3000);
        } else {
            alert()->error('Error', trans('auth.unable_create_user'))->autoclose(3000);
        }

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all('name', 'id');
        $permissions = Permission::all('name', 'id');

        return view('user.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1'
        ]);

        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);

        $user->save();

        alert()->success('Success', trans('auth.user_updated'))->autoclose(3000);

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if ( Auth::user()->id == $id ) {
            alert()->warning('Warning', trans('auth.deletion_not_allowed'))->autoclose(3000);
            return redirect()->back();
        }

        if( User::findOrFail($id)->delete() ) {
            alert()->success('Success', trans('auth.user_deleted'))->autoclose(3000);
        } else {
            alert()->success('Success', trans('auth.user_not_deleted'))->autoclose(3000);
        }

        return redirect()->back();
    }

    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);

        return $user;
    }

    public function userImage(Request $request)
    {
        $id = $request->id;
        $img = $request->img;

        if(Storage::exists('users/'.$id.'/images/'.$img))
        {
            $file = Storage::get('users/'.$id.'/images/'.$img);
            return response($file, 200)->header('Content-Type', 'image/jpeg');
        }
        else
        {
            $file = Storage::get('public/user.png');
            return response($file, 200)->header('Content-Type', 'image/png');
        }
    }

    public function editProfile()
    {
        if(Auth::user())
        {
            $user = Auth::user();
            $roles = Role::all('name', 'id');
            $permissions = Permission::all('name', 'id');

            return view('user.editProfile', compact('user', 'roles', 'permissions'));
        }
        else
        {
            return redirect('/login');
        }
    }

    public function showProfile()
    {
        if(Auth::user())
        {
            $user = Auth::user();
            $roles = Role::all('name', 'id');
            $permissions = Permission::all('name', 'id');

            return view('user.profile', compact('user', 'roles', 'permissions'));
        }
        else
        {
            return redirect('/login');
        }
    }

    public function updateProfile(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'timezone' => 'required',
            'password' => 'nullable|min:6|max:15|confirmed',
            'password_confirmation' => 'nullable|min:6|max:15',
        );
        $this->validate($request,$rules);

        $user = Auth::user();

        //check if password change
        if(isset($request->password))
        {
            if(isset($request->current_password))
            {
                if (Hash::check($request->current_password, $user->password))
                {
                    $user->password = bcrypt($request->password);
                }
                else
                {
                    return redirect()->back()->with(['error'=>trans('users.Current password is invalid.')]);
                }
            }
            else
            {
                return redirect()->back()->with(['error'=>trans('users.Current password not filled.')]);
            }
        }

        $user->name = $request->name;
        $user->timezone = $request->timezone;

        if($request->hasFile('user-img')){
            $img = $request->file('user-img');
            $image_name = time() . '.' . $img->getClientOriginalExtension();

            $img->storeAs('users/'.$user->id.'/images/',$image_name);

            //delete old img
            if($user->img!=null && Storage::exists('users/'.$user->id.'/images/'.$user->img))
                Storage::delete('users/'.$user->id.'/images/'.$user->img);

            $user->img = $image_name;
        }

        $user->save();
        alert()->success('Success', 'Details saved')->autoclose(2000);

        return redirect('/profile');
    }
}
