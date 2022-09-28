<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model {
  protected $fillable = [
    'firebaseKey',
  ];

  protected $table = 'chatrooms';

  public function messages()
  {
    return $this->hasMany('App\Models\Message', 'chatroom_id')->orderByDesc('created_at');
  }

  public function participants()
  {
    return $this->hasMany('App\Models\ChatroomParticipant', 'chatroom_id')->with('user');
  }
}