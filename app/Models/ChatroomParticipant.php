<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ChatroomParticipant extends Model {
  protected $fillable = [
    'chatroom_id',
    'user_id',
  ];

  protected $table = 'chatroom_participants';

  public function user() {
    return $this->belongsTo('App\User', 'user_id')->with('avatars', 'profile');
  }
}