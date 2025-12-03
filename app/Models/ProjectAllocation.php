<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAllocation extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectAllocationFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'approval_date' => 'date',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
