<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model {
  protected $fillable = [
    'user_id',
    'age_min',
    'age_max',
    'sexality',
    'area',
    'height_min',
    'height_max',
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
  ];

  protected $table = 'conditions';
}