<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AvailableContent extends Model {
  protected $fillable = [
    'user_id',
    'content_id',
  ];

  protected $table = 'available_contents';
}