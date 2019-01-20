<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['site_name', 'address', 'conctac_number', 'contact_email'];
}
