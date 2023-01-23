<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ConsultantConfirm extends Model {
  protected $fillable = [
    'consultant_id',
    'confirm_id',
  ];

  protected $table = 'consultant_confirms';
}