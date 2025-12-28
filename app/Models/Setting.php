<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
      protected $fillable = [
        'email',
        'address',
        'contact_number',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'google_site_key',
    ];
}
