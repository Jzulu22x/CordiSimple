<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'events';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = [];
    protected $fillable = [
        'name',
        'description',
        'location',
        'people_capacity',
        'status_id',
        // Otros campos...
    ];

    // protected $hidden = [
    // ];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function reserve()
    {
        return $this->belongsTo(Reserve::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
