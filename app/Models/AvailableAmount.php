<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AvailableAmount extends Model {
  protected $fillable = [
    'user_id',
    'amount_id',
  ];

  protected $table = 'available_amounts';
}