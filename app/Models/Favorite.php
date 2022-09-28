<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model {
  protected $fillable = [
    'user_id',
    'target_id',
  ];

  protected $table = 'favorites';

  public function target()
  {
    return $this->belongsTo('App\User', 'target_id')->with('avatars', 'profile');
  }
}