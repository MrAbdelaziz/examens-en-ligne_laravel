<?php
namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model, $role='') {
        // return view('users.index', ['items' => $model->paginate(15)]);
        $role_id=null;
        if($role=="administrators"){ $role_id=1; $therole="Administrators"; }
        elseif($role=="supervisors"){ $role_id=2; $therole="Supervisors"; }
        elseif($role=="authors"){ $role_id=3; $therole="Authors"; }
        elseif($role=="members"){ $role_id=4; $therole="Members"; }
        else{ $therole="Users"; }
        if(!empty($role_id)){
            if(Auth::user()->role_id == 1){
                $items = User::latest('updated_at')->where(['role_id' => $role_id])->get();
            }elseif(Auth::user()->role_id == 2){
                if($role_id == 3 || $role_id == 4){
                    $items = User::latest('updated_at')->where(['role_id' => $role_id])->get();
                }elseif($role_id == 2){
                    $items = User::latest('updated_at')->where(['id' => Auth::user()->id])->get();
                }
            }elseif(Auth::user()->role_id == 3){
                if($role_id == 3){
                    $items = User::latest('updated_at')->where(['role_id' => $role_id])->where('id', Auth::user()->id)->get();
                }
            }elseif(Auth::user()->role_id == 4){
                if($role_id == 4){
                    $items = User::latest('updated_at')->where(['role_id' => $role_id])->where('id', Auth::user()->id)->get();
                }
            }
        }elseif(empty($role_id)){
            if(Auth::user()->role_id == 1){
                $items = User::latest('updated_at')->get();
            }elseif(Auth::user()->role_id == 2){
                $items = User::latest('updated_at')->where([['role_id', '!=', '1'], ['role_id', '!=', '2']])->get();
            }
        }
        //dd($items);
        return view('users.index', compact('items','therole'));
    }
    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2){
            return view('users.create');
        }else{
            abort('404');
        }
    }
    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model) {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }
    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }
    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user) {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));
        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }
    /**
     * Make item active.
     * 
     */
    public function activate(Request $request) {
        $item = User::findOrFail($request->id);
        $item->status='1';
        $item->save();
        return redirect()->back()->withStatus(__('User successfully activated.'));
    }
    /**
     * Make item inactive.
     * 
     */
    public function deactivate(Request $request) {
        $item = User::findOrFail($request->id);
        $item->status='3';
        $item->save();
        return redirect()->back()->withStatus(__('User successfully deactivated.'));
    }
    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user) {
        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2){
            $user->delete();
            return redirect()->back()->withStatus(__('User successfully deleted.'));
        }else{
            abort('404');
        }
    }
}
