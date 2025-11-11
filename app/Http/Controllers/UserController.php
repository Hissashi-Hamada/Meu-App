<?php
namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\UserProfile;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    { 
        $input = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $input['password'] = Hash::make($input['password']);

        User::create($input);

        return redirect()
            ->route('users.index')
            ->with('status', 'Usuário adicionado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {    
        $input = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'exclude_if:password,null|min:6'
        ]);
 
        $user->fill($input);    
        $user->save();

        return redirect()
        ->route('users.index')
        ->with('status', 'Usuário editado com sucesso!'); 
    }  
    
    public function updateProfile(User $user, Request $request)
    {
        $input = $request->validate([
            'type' => 'required',
            'address' => 'nullable',
        ]);

        UserProfile::updateOrCreate([
            'user_id' => $user->id,
        ], $input);

        return back()
            ->with('status', 'Usuário deletado com sucesso.');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return back()
            ->with('status', 'Usuário deletado com sucesso.');

    }
}
