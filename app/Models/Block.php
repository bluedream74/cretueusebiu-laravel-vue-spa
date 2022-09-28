<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Block extends Model {
  protected $fillable = [
    'user_id',
    'target_id',
  ];

  protected $table = 'blocks';

  public function target()
  {
    return $this->belongsTo('App\User', 'target_id')->with('avatars', 'profile');
  }
}