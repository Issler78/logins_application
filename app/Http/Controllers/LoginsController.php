<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredLogin;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

use function Laravel\Prompts\password;

class LoginsController extends Controller
{
    public readonly Login $login;
    
    public function __construct()
    {
        $this->login = new Login();
    }

    public function index()
    {
        $logins = $this->login->all();
        // var_dump($logins);
        return view('logins', ['logins' => $logins]);
    }

    public function create()
    {
        return view('addUser');
    }

    public function store(StoredLogin $request)
    {
        // var_dump('TESTE');
        $created = $this->login->create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT)
        ]);

        if($created)
        {
            return redirect()->route('logins.index')->with('message', 'Login added successfully.');
        }
        
        return redirect()->back()->withErrors(['message', 'Failed to add login.']);
    }

    public function show(Login $login)
    {
        return view('login_view', ['login' => $login]);
    }

    public function edit(Login $login)
    {
        return view('login_edit', ['login' => $login]);
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all(), $id);
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4|unique:logins,username,' . $id,
            'email' => 'required|email|unique:logins,email,' . $id
        ], (new StoredLogin)->messages());
        // dd($validator->fails());

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $update = $this->login->where('id', $id)->update($request->except(['_token', '_method']));
        if($update)
        {
            return redirect()->route('logins.index')->with('message', 'Succesfully Updated');
        }

        return redirect()->back()->with('message', 'Error Update');
    }

    public function destroy(string $id)
    {
        $deleted = $this->login->where('id', $id)->delete();
        if($deleted)
        {
            return redirect()->route('logins.index')->with('message', 'Succesfully Deleted');
        }

        return redirect()->route('logins.index')->with('message', 'Error Deleted');
    }
}
