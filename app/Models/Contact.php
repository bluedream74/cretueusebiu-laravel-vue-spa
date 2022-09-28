<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model {
  protected $fillable = [
    'user_id',
    'nickname',
    'email',
    'content',
    'answer'
  ];

  protected $table = 'contacts';

  public function user() 
  {
    return $this->belongsTo('App\User', 'user_id');
  }
}