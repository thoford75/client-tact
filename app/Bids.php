<?php

namespace App;

class Bids extends \Eloquent
{
    public $timestamps = false;
    public $primaryKey = 'bid_id';
    protected $table = 'dbBids';
}

class Comm extends \Eloquent
{
    public $timestamps = false;
    public $primaryKey = 'id';
    protected $table = 'dbClientComm';
}
