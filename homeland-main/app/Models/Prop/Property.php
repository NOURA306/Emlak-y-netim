<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = "props";

    public $fillable = [
        'title',
        'price',
         'image',
         'beds',
         'baths',
         'sq_ft',
         'home_type',
         'year_built',
         'more_info',
         'location',
         'city',
         'agent_name',
         'type',
     ];
 
        

    public $timestamps = true;
   
}
