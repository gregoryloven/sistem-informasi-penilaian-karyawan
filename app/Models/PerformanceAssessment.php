<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceAssessment extends Model
{
    use HasFactory;
    protected $table = 'performance_assessments';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function employee()
    {
    	return $this->belongsTo(Employee::class, 'employee_id');
    }
}
