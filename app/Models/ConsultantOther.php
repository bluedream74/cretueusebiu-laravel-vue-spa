<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ConsultantOther extends Model {
  protected $fillable = [
    'consultant_id',
    'other_id',
  ];

  protected $table = 'consultant_others';
}