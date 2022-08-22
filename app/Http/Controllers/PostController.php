<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post =  Post::get();
        return response()->json($post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //code...
            $model = new Post();
            $post =   $request->only($model->getFillable());
            $post =   $model->create($post);
            return response()->json(["result" => true, "data" => $post]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(["result" => false, "error" => $th]);
        }
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            //code...
            $model = Post::findOrFail($id);
            $post =   $request->only($model->getFillable());
            $post =   $model->update($post);
            return response()->json(["result" => true, "data" => $model]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(["result" => false, "error" => $th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            $model = Post::findOrFail($id)->delete();

            return response()->json(["result" => true]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(["result" => false, "error" => $th]);
        }
    }
}
