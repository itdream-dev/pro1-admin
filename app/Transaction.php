<?php

namespace App;

/******************************************************
 * IM - Vocabulary Builder
 * Version : 1.0.2
 * Copyright© 2016 Imprevo Ltd. All Rights Reversed.
 * This file may not be redistributed.
 * Author URL:http://imprevo.net
 ******************************************************/

use Illuminate\Database\Eloquent\Model;
use App\Word;

class Transaction extends Model
{
	protected $fillable = ['type', 'user_id', 'coin_id', 'from_address', 'amount'	];

	public function user()
	{
			return $this->belongsTo('App\User');
	}

	public function coin()
	{
			return $this->belongsTo('App\Coin');
	}
}
