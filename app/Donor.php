<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model {

	protected $guarded = [];

	//each post has only one bloodgroup
	public function bloodgroup() {
		return $this->belongsTo( BloodGroup::class );
	}

	//each donor has only one district
	public function district() {
		return $this->belongsTo( District::class );
	}

	//each donor has only one district
	public function user() {
		return $this->belongsTo( User::class );
	}


}
