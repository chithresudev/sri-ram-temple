<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FamilyDetails extends Model
{
    public function donor()
    {
        return $this->belongsTo('App\Models\Donor');
    }

    public function getFamilyHeadAttribute()
    {
        return $this->donor->name;
    }

    public function getBirthdayAttribute()
    {
        $string = Carbon::parse($this->dob)->age;
        return $string . ' Age';
    }
}
