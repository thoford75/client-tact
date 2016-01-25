<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bids extends \Eloquent
{
    protected $table = 'dbBids';
    public $timestamps = false;
    public $primaryKey = 'bid_id';
}
