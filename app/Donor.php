<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    //
    public function getAddressAttribute()
    {
        $address1 = ($this->address1 != '') ? $this->address1 : '';
        $address2 = ($this->address2 != '') ? $this->address2 : '';
        $district = ($this->district != '') ? $this->district : '';
        $state = ($this->state != '') ? $this->state : '';
        $pincode = ($this->pincode != '') ? $this->pincode : '';
        return  $address1 . ', ' . $address2 . ', ' . $district . ', ' . $state . ' - ' . $pincode . '.';
    }

    public function getPrintAddressAttribute()
    {
          $name = ($this->name != '') ? $this->name : '';
          $phone = ($this->phone != '') ? $this->phone : '';
          $doorno = ($this->doorno != '') ? $this->doorno : '';
          return '<h4>' . $name . '</h4>' .$doorno . ',' . $this->address . ','
             . $phone ;
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
}
