<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLog;

class Contact extends Model
{
    protected $fillable = [
        'company_name',
        'individual_name',
        'email',
        'phone',
        'job_title',
        'location',
        'date_added',
        'lead_status',
    ];


    public function leadUpdates()
    {
        return $this->hasMany(LeadUpdate::class);
    }
}
