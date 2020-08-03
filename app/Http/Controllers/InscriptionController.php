<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Examination;
use Auth;

class InscriptionController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $items="";
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $items = Examination::latest('updated_at')->get();
        }elseif(Auth::user()->role_id==4){
            $items = Examination::latest('updated_at')->where('user_id',Auth::user()->id)->get();
        }
        return view('inscriptions.index', compact('items'));
    }
    /**
     *
     * ACCEPT, REJECT AND DELETE INSCRIPTION
     *
     */
    public function accept(Request $request) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $item = Examination::findOrFail($request->id);
            $item->registration_status='1';
            $item->save();
            return redirect()->back()->withStatus(__('Inscription successfully accepted.'));
        }else{
            abort('404');
        }
    }
    public function reject(Request $request) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $item = Examination::findOrFail($request->id);
            $item->registration_status='3';
            $item->save();
            return redirect()->back()->withStatus(__('Inscription successfully rejected.'));
        }else{
            abort('404');
        }
    }
    public function destroy(Examination  $inscription) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $inscription->delete();
            return redirect()->back()->withStatus(__('Inscription successfully deleted.'));
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
    public function store(Request $request, Examination $model) {
        $model->create($request->all());
        return redirect()->route('inscription.index')->withStatus(__('Inscription successfully created.'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $item = Examination::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('inscription.index')->withStatus(__('Inscription successfully updated.'));
    }
}
