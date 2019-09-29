<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class FamilyDetails extends Model
{

  public function donor()
  {
      return $this->belongsTo('App\Donor');
  }

  public function getFamilyHeadAttribute()
  {
    return $this->donor->name;
  }

  public function getBirthdayAttribute()
  {
    $string = Carbon::parse($this->dob)->age;
    return $string . 'th';
  }

}
