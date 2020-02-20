<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Controllers\Api\AppController;
use App\User;

class UserController extends AppController
{
    protected $users;

    public function __construct()
    {
        $this->users = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = $this->users->all();

        return response()->success($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        $data = $request->all();

        $request->validated();

        $user = $this->users->create($data);
        return response()->success($user);
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
        $user = $this->users->findOrFail($id);
        return response()->success($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = $this->users->findOrFail($id);
        return response()->success($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        //
        $user = $this->users->findOrFail($id);
        $request->validated();
        $user = $user->fill($request->all())->update();
        return response()->success($user);
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
        $user = $this->users->findOrFail($id);
        $user = $user->delete();
        return response()->success($user);
    }

    /**
     * 復帰処理
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $user = $this->users->onlyTrashed()->findOrFail($id);
        $user = $user->restore();
        return response()->success($user);
    }

    /**
     * 完全削除
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $user = $this->users->onlyTrashed()->findOrFail($id);
        $user = $user->forceDelete();
        return response()->success($user);
    }
}
