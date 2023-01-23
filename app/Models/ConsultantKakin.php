<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ConsultantKakin extends Model {
  protected $fillable = [
    'consultant_id',
    'user_id',
    'status', //default 1
  ];

  protected $table = 'consultant_kakins';
  
  public function consultant() {
    return $this->belongsTo('\App\Models\Consultant', 'consultant_id');
  }
}