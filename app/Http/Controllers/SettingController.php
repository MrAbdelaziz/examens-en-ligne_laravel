<?php
namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;
class SettingController extends Controller {
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    /*  */
    public function create() {
        return view('settings.index');
    }
}
