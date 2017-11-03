<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'prince',
        'prince_paid',
        'due_date',
        'payment_date',
        'type',
        'source_id',
        'user_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function source()
    {
        return $this->belongsTo('App\Source');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
