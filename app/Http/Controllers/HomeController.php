<?php
namespace App\Http\Controllers;
use App\Exam;
use App\User;
use App\Categorie;
use App\Examination;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $nbr_categories=Categorie::count();
        $nbr_exams=Exam::count();
        $nbr_authors=User::where('role_id','3')->count();
        $nbr_membres=User::where('role_id','4')->count();
        $users=User::where('role_id','4')->get();
        $examinations=Examination::where('certification_status', '!=',null)->get();
        return view('dashboard',compact('nbr_categories','nbr_exams','nbr_authors','nbr_membres','users','examinations'));
    }
    public static function getusername($id){
        $user=User::where('id', $id)->first();
        return $user->name;
    }
}
