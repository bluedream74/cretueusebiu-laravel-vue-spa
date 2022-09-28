<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class News extends Model {
  protected $fillable = [
    'content',
    'user_id',
    'title',
    'readed'
  ];

  protected $table = 'news';

  public function user() {
    return $this->belongsTo('\App\User', 'user_id')->with('profile');
  }
}