<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Message extends Model {
  protected $fillable = [
    'chatroom_id',
    'sender_id',
    'content',
    'read_flags'
  ];

  protected $table = 'messages';

  public function user() {
    return $this->belongsTo('App\User', 'sender_id')->with('profile', 'avatars');
  }
}