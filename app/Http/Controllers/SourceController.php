<?php

namespace App\Http\Controllers;

use App\Source;
use Illuminate\Http\Request;
use Auth;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sources'] = Source::all();
        return view('sources.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sources.create');
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
            'name' => 'required|unique:sources|max:60',
            'initial_balance' => 'required'
        ]);

        $dataToInsert = [
            'name' => $request->name,
            'initial_balance' => $request->initial_balance,
            'current_balance' => $request->initial_balance,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ];

        $save = Source::create($dataToInsert);

        if ($save) {
            return redirect('sources/' . $save->id . '/edit')->withSuccess('A origem ' . $save->name . ' foi criada com sucesso.');
        }

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['source'] = Source::find($id);
        return view('sources.create', $data);
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
            'name' => 'required|max:60|unique:sources,name,' . $id,
            'initial_balance' => 'required'
        ]);

        $dataToUpdate = [
            'name' => $request->name,
            'initial_balance' => $request->initial_balance,
            'current_balance' => $request->initial_balance,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ];

        $update = Source::find($id)->update($dataToUpdate);

        if ($update) {
            return redirect('sources');
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
        $user = Source::find($id);

        if ($user) {
            $user->destroy($id);
            $msg = 'Origem com o id:'.$id.' foi deletada.';
        } else {
            $msg = 'Origem com o id:'.$id.' não foi encontrada.';
        }

        return redirect()->back()->withSuccess($msg);
    }
}
