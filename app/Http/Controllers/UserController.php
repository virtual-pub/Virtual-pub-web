<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\Cerveja;
use Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $id = Auth::user()->id;
            if(Gate::allows('isMantenedor')){
                $users = User::paginate(3);
                return view('users.users_list', compact('users'));
            }else{
                return redirect()->route('users.show', $id);
            }
        }else{
            return redirect('/');
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            # code...
            $reg = User::find($id);
            $posts = Post::where('user_id', $id)->get();
            $cervejas = Cerveja::where('fabricante_id', $id)->get();
            return view('users.profile', compact('reg', 'posts', 'cervejas'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()){
            $reg = User::find($id);
            if($reg->id == Auth::user()->id){
            $acao = 2;
            return view('users.users_form', compact('reg', 'acao'));
            }else {
                return redirect('/');
            }
        }else {
            return redirect('/');
        }
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
        if(Gate::allows('isFabricante')){
            $this->validate($request, [
                'name' => 'required',
                'sobre' => 'required',
                'fabricante_name' => 'required',
                'website' => 'required'
            ]);
        }else{
            $this->validate($request, [
                'name' => 'required',
                'sobre' => 'required'
            ]);
        }
        
        $reg = User::find($id);

        $dados = $request->all();

        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->route('users.show', $reg->id);
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
    }

    public function isMantenedor($id) {
        
        if(Auth::check()){
            $reg = User::find($id);

            $reg->isMantenedor = ($reg->isMantenedor == 0) ? 1 : 0;
            $estado = ($reg->isMantenedor == 1) ? 'é mantenedor' : 'não é mantenedor';

            $reg->save();

            if ($reg) {
                return redirect()->route('users.index')
                                ->with('status', $reg->name . ' ' . $estado . '!');
            }
        }else {
            return redirect('/');
        }
    }
    public function isFabricante($id) {
        if(Auth::check()){
            if(Gate::allows('isMantenedor')){
                $reg = User::find($id);

                $reg->isFabricante = ($reg->isFabricante == 0) ? 1 : 0;
                $estado = ($reg->isFabricante == 1) ? 'é Fabricante' : 'não é Fabricante';

                $reg->save();

                if ($reg) {
                    return redirect()->route('users.index')
                                    ->with('status', $reg->name . ' ' . $estado . '!');
                }
            }else if(Gate::allows('isUser')){
                $user = Auth::user();
                $reg = User::find($id);
                if ($user->id == $reg->id ) {
                    $reg->isFabricante = ($reg->isFabricante == 0) ? 1 : 0;
                    $reg->isUser = ($reg->isUser == 1) ? 0 : 1;
                    $reg->save();

                    if ($reg) {
                        return redirect()->route('users.edit', $reg->id);
                    }
                }else {
                    return redirect('/');
                }
            }else {
                return redirect('/');
            }
        }else {
            return redirect('/');
        }
    }
    public function isUser($id) {
        if(Auth::check()){
            if(Gate::allows('isMantenedor')){
                $reg = User::find($id);

                $reg->isUser = ($reg->isUser == 0) ? 1 : 0;
                $estado = ($reg->isUser == 1) ? 'é Usuário' : 'não é Usuário';

                $reg->save();

                if ($reg) {
                    return redirect()->route('users.index')
                                    ->with('status', $reg->name . ' ' . $estado . '!');
                }
            }else {
                return redirect('/');
            }  
        }else {
            return redirect('/');
        }
    }

   /**
 * Follow the user.
 *
 * @param $profileId
 *
 */
public function followUser(int $profileId)
{
  $reg = User::find($profileId);
  if(! $reg) {
    
     return redirect()->back()->with('error', 'User does not exist.'); 
 }

$reg->followers()->attach(auth()->user()->id);
return redirect()->back()->with('success', 'Successfully followed the user.');
}

 /**
 * Follow the user.
 *
 * @param $profileId
 *
 */
public function unFollowUser(int $profileId)
{
  $user = User::find($profileId);
  if(! $user) {
    
     return redirect()->back()->with('error', 'User does not exist.'); 
 }
$user->followers()->detach(auth()->user()->id);
return redirect()->back()->with('success', 'Successfully unfollowed the user.');
} 
 

}
