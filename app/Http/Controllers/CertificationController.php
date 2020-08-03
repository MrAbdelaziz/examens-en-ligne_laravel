<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Examination;
use Carbon\Carbon;
use Auth;
class CertificationController extends Controller {
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
        $items = [];
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $items = Examination::where('registration_status','=','1')->whereNotNull("certification_status")->latest('updated_at')->get();
        }elseif(Auth::user()->role_id==4){
            $items = Examination::where('registration_status','=','1')->whereNotNull("certification_status")->where('user_id',Auth::user()->id)->latest('updated_at')->get();
        }
        return view('certifications.index', compact('items'));
    }
    /**
     *
     * ACCEPT, REJECT AND DELETE Certification
     *
     */
    public function accept(Request $request) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $item = Examination::findOrFail($request->id);
            $item->certification_status='1';
            $item->save();
            return redirect()->back()->withStatus(__('Certification successfully accepted.'));
        }else{
            abort('404');
        }
    }
    public function reject(Request $request) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $item = Examination::findOrFail($request->id);
            $item->certification_status='3';
            $item->save();
            return redirect()->back()->withStatus(__('Certification successfully rejected.'));
        }else{
            abort('404');
        }
    }
    public function destroy(Examination  $certification) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $certification->delete();
            return redirect()->back()->withStatus(__('Certification successfully deleted.'));
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
        return redirect()->route('certification.index')->withStatus(__('Certification successfully created.'));
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
        return redirect()->route('certification.index')->withStatus(__('Certification successfully updated.'));
    }
}
