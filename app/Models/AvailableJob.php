<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AvailableJob extends Model {
  protected $fillable = [
    'user_id',
    'job_id',
  ];

  protected $table = 'available_jobs';
}