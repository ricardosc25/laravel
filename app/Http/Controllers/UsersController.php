<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use Auth;
use Image;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate(5);
        return view('admin.users.listaUsuarios', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User($request->all());
        $user->save();
        flash('Se ha creado el usuario '.$user->name.' de forma exitosa')->success();

        return redirect()->route('users.index');
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
        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user); 
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
        $user->fill($request->all()); //Obtiene todos los datos que vienen del formulario.
        // $user->name = $request->name; Esta es otra manera de obtener los datos enviados desde el formulario Seteandolos.
        $user->save();
        flash('La información del usuario '.$user->name.' se actualizó de forma exitosa')->success();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->idUser);
        $user->delete();
        flash('Se ha eliminado el usuario '.$user->name.' de forma exitosa')->error();

        return redirect()->route('users.index');
        
    }

    public function profile(){
        return view('front.profile',['user' => Auth::user()]);
    }

    public function update_avatar(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/Image/Profile/Avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

            return view('front.profile',['user' => Auth::user()]);
        }
    }
}
