<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('users.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:60',
            'email' => 'required|unique:users'
        ]);

        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->name)
        ];

        $save = User::create($user);
        if ($save) {
            return redirect('users/' . $save->id . '/edit')->withSuccess('O usuário ' . $save->name . ' foi criado com sucesso.');
        }

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('users.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:60',
            'email' => 'required|unique:users,name,'.$id
        ]);

        if ($request->has('password')) {
            $password = $request->password;
            $user = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password
            ];
        } else {
            $user = [
                'name' => $request->name,
                'email' => $request->email
            ];
        }

        $update = User::find($id)->update($user);

        if ($update) {
            return redirect('users');
        }

        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->destroy($id);
            $msg = 'Usuario com o id:'.$id.' foi deletado.';
        } else {
            $msg = 'Usuario com o id:'.$id.' não foi encontrado.';
        }

        return redirect()->back()->withSuccess($msg);
    }
}
