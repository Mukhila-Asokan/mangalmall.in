<?php

namespace Modules\StaffManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\StaffManagement\Database\Factories\StaffEmergencyFactory;

class StaffEmergency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    protected $table = "staff_emergency_contacts";

    // protected static function newFactory(): StaffEmergencyFactory
    // {
    //     // return StaffEmergencyFactory::new();
    // }
}
