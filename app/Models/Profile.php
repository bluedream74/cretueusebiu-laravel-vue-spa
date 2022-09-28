<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
  protected $fillable = [
    'user_id',
    'nickname',
    'gender',
    'age',
    'sexality',
    'area',
    'height',
    'body_type',
    'job',
    'holiday',
    'salary',
    'study',
    'liquor',
    'tobacco',
    'partner',
    'history',
    'style',
    'child',
    'introduction'
  ];

  protected $table = 'profiles';
}