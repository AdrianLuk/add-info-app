<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\User;
use URL;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        return view('pages.listing', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'name' => 'required|min:2',
            'province' => 'required',
            'telephone' => ['required', 'regex:/^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/'],
            'postal' =>['required', 'regex:/([ABCEGHJ-NPRSTVXY]\d[A-Z])[\s\-]?(\d[A-Z]\d)/'],
            'salary' => ['required', 'regex:/((?:[0-9]{1,3}[ \.,]?)*[\.,]?[0-9]+)/']
        );

$validator = Validator::make($request->all(), $rules);
if ($validator->fails()){
    $messages = $validator->messages();
    return redirect(URL::previous())->withErrors($validator)->withInput();
}else{

        $user = new User;
        $user->name = $request->input('name');
        $user->province = $request->input('province');
        $user->telephone = $request->input('telephone');
        $user->postal = $request->input('postal');
        $user->salary = $request->input('salary');
        $user->save();
        return redirect('listing');
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
        return view('pages.listing');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.users-edit', compact('user'));
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
        $user = User::find($id);
        $userData = array_filter($request->all());
        $user->fill($userData);
        $user->save();

        return redirect('listing');
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
        $user->delete();

        return redirect('listing');
    }
}
