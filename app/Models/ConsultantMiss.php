<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ConsultantMiss extends Model {
  protected $fillable = [
    'consultant_id',
    'miss_id',
  ];

  protected $table = 'consultant_misss';
}