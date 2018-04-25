<?php

namespace App\Http\Controllers;

use App\BloodGroup;
use App\District;
use Illuminate\Http\Request;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$districts   = District::all('id','name');
		$blood_group = BloodGroup::all('id','name');
		return view( 'home', compact( 'districts', 'blood_group' ) );
	}

}
