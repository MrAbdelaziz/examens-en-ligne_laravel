<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categorie;
use Auth;

class CategoryController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $items = Categorie::latest('updated_at')->get();
            return view('categories.index', compact('items'));
        }else{
            abort('404');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            return view('categories.create');
        }else{
            abort(404);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Categorie $model) {
        $model->create($request->all());
        return redirect()->route('category.index')->withStatus(__('Category successfully created.'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $category) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            return view('categories.edit', compact('category'));
        }else{
            abort(404);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $item = Categorie::findOrFail($id);
            $item->update($request->all());
            return redirect()->route('category.index')->withStatus(__('Category successfully updated.'));
        }else{
            abort('404');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie  $category) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $category->delete();
            return redirect()->back()->withStatus(__('Category successfully deleted.'));
        }else{
            abort('404');
        }
    }
}
