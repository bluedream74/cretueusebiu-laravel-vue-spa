<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ConsultantAnswer extends Model {
  protected $fillable = [
    'consultant_id',
    'user_id',
    'answer',
  ];

  protected $table = 'consultant_answers';
  
  public function consultant() {
    return $this->belongsTo('\App\Models\Consultant', 'consultant_id');
  }
}