<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model {
  protected $fillable = [
    'name',
    'huri_name',
    'email',
    'telephone',
    'fax',
    'content'
  ];

  protected $table = 'contacts';
}