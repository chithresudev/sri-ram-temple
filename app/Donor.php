<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{

    protected $fillable = [
        'name',
        'address1',
        'address2',
        'city',
        'district',
        'state',
        'pincode',
        'phone1',
        'phone2'
    ];

    //
    public function getAddressAttribute()
    {
        $address1 = ($this->address1 != '') ? $this->address1 : '';
        $address2 = ($this->address2 != '') ? $this->address2 : '';
        $district = ($this->district != '') ? $this->district : '';
        $city = ($this->city != '') ? $this->city : '';
        $state = ($this->state != '') ? $this->state : '';
        $pincode = ($this->pincode != '') ? $this->pincode : '';
        return  $address1 . ',' . $address2 . ',' . $city . ',' . str_before($district, '_') . ', ' . $state . ' - ' . $pincode . '.';
    }

    public function getPhoneDetailsAttribute()
    {
        $phone1 = ($this->phone1 != '') ? $this->phone1 : '';
        $phone2 = ($this->phone2 != '') ? ', ' . $this->phone2 : '';
        return  $phone1 . $phone2;
    }


    public function getPrintAddressAttribute()
    {
        $name = ($this->name != '') ? $this->name : '';
        return '<h4>' . $name . '</h4>' . $this->address . ','
            . $this->phone_details;
    }


    public function families()
    {
        return $this->hasMany('App\FamilyDetails');
    }

    public function donations()
    {
        return $this->hasMany('App\Donation', 'donor_id');
    }

    public function isPrinted()
    {
        return $this->hasMany('App\Printable', 'donor_id');
    }

    public function getPrintCountAttribute()
    {
        $count = $this->isPrinted->count();
        return $count;
    }

    public function getPrintLastTimeAttribute()
    {
        $lastTime = $this->isPrinted()->orderBy('created_at', 'desc')->latest()->first();
        return Carbon::parse($lastTime['created_at'])->format('Y M d');
    }

    public function getTotalAmountAttribute()
    {
        return $this->donations->sum('amount');
    }

    public function getLastIDAttribute()
    {
        $last = $this->latest('id')->first();
        return $last->id;
    }

    public function getBirthdayAttribute()
    {
        $string = Carbon::parse($this->dob)->age;
        return $string . ' Age';
    }
}
