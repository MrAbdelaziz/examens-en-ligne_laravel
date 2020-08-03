<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categorie;
use App\Subcategorie;
use Auth;
class SubcategoryController extends Controller {
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
            $items = Subcategorie::latest('updated_at')->get();
            return view('subcategories.index', compact('items'));
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
            $categs = Categorie::get();
            return view('subcategories.create', compact('categs'));
        }else{
            abort('404');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Subcategorie $model) {
        $model->create($request->all());
        return redirect()->route('subcategory.index')->withStatus(__('Subcategory successfully created.'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategorie $subcategory) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $categs = Categorie::get();
            return view('subcategories.edit', compact('subcategory','categs'));
        }else{
            abort('404');
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
        $item = Subcategorie::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('subcategory.index')->withStatus(__('Subcategory successfully updated.'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategorie  $subcategory) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $subcategory->delete();
            return redirect()->back()->withStatus(__('Subcategory successfully deleted.'));
        }else{
            abort('404');
        }
    }
}
