<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::with('sub_category')->get();
        return view('categories.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::where('parent_id', 0)->get();
        return view('categories.create', $data);
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
            'name' => 'required|unique:categories|max:60',
            'description' => 'required'
        ]);

        $category = [
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'parent_id' => $request->parent_id
        ];

        $save = Category::insert($category);

        if ($save) {
            return redirect('categories');
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
        $data['category'] = Category::find($id);
        $data['categories'] = Category::where('parent_id', 0)->get();
        return view('categories.create', $data);
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
            'name' => 'required|unique:categories|max:60',
            'description' => 'required'
        ]);

        $category = [
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'parent_id' => $request->parent_id
        ];

        $update = Category::find($id)->update($category);

        if ($update) {
            return redirect('categories');
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
        $user = Category::find($id);

        if ($user) {
            $user->destroy($id);
            $msg = 'Categoria com o id:'.$id.' foi deletada.';
        } else {
            $msg = 'Categoria com o id:'.$id.' não foi encontrada.';
        }

        return redirect()->back()->withSuccess($msg);
    }
}
