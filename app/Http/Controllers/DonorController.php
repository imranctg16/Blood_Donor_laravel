<?php

namespace App\Http\Controllers;

use App\BloodGroup;
use App\District;
use App\Donor;
use App\User;
use Illuminate\Http\Request;

class DonorController extends Controller {


	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index( Request $request ) {


		$district_id = request( 'district_select' );
		$blood_id    = request( 'blood_select' );


		$result = Donor::where( 'district_id', '=', $district_id )->where( 'blood_group_id', '=', $blood_id )->get();

		return view( 'donor', compact( 'result' ) );
		//for api
		//return $result;

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$districts   = District::all( 'id', 'name' );
		$blood_group = BloodGroup::all( 'id', 'name' );

		return view( 'donor_create', compact( 'districts', 'blood_group' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {


	/*	$this->validate($request, [
			'mobile' => 'required|mobile',
			'donor_image' => 'required|donor_image',
		]);*/




		$user_name    = User::find( auth()->id() )->name;
		$district_id  = request( 'district_select' );
		$blood_id     = request( 'blood_select' );
		$mobile       = request( 'mobile' );
		$file         = $request->file( 'donor_image' );
		$picture_name = $file->getClientOriginalName();
		$file->move( 'images/' . $user_name, $picture_name );

		$api_value= Donor::create( [

			'user_id'        => auth()->id(),
			'district_id'    => $district_id,
			'blood_group_id' => $blood_id,
			'mobile'         => $mobile,
			'picture'        => $picture_name,
		] );

		return redirect('/home');

//		$input = $request->all();
//
//		if ( $file = $request->file( 'donor_image' ) ) {
//			$picture_name = $file->getClientOriginalName();
//			$file->move( 'images', $picture_name );
//			$input['picture'] = $picture_name;
//		}
//		Donor::create( $input );
//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
	}
}
