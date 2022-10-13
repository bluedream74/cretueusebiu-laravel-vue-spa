<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model {
  protected $fillable = [
    'com_name',
    'job',
    'zipcode',
    'prefecture',
    'city',
    'building',
    'amount',
    'income',
    'telephone',
    'fax',
    'email',
    'tanto_name',
    'department_name',
    'role_name',
    'price',
    'message_title',
    'message_content',
    'expired_at'
  ];

  protected $table = 'consultants';

  public function confirms() {
    return $this->hasMany('\App\Models\ConsultantConfirm', 'consultant_id');
  }

  public function misss() {
    return $this->hasMany('\App\Models\ConsultantMiss', 'consultant_id');
  }

  public function others() {
    return $this->hasMany('\App\Models\ConsultantOther', 'consultant_id');
  }

  public function answers() {
    return $this->hasMany('\App\Models\ConsultantAnswer', 'consultant_id');
  }
}