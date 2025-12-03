<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 'active';

    public const STATUS_ENDED = 'ended';

    protected $fillable = [
        'title',
        'project_code',
        'sst_date',
        'jpict_number',
        'jpict_approval_date',
        'contract_period',
        'start_date',
        'end_date',
        'contract_value',
        'company_name',
        'company_pic',
        'department_owner',
        'project_owner',
        'officer_in_charge',
        'sealed_date',
        'contract_status',
        'remarks',
    ];

    protected $casts = [
        'sst_date' => 'date',
        'jpict_approval_date' => 'date',
        'start_date' => 'date',
        'end_date' => 'date',
        'sealed_date' => 'date',
    ];

    public function allocations()
    {
        return $this->hasOne(ProjectAllocation::class);
    }

    public function getContractStatusLabelAttribute()
    {
    return self::statusOptions()[$this->contract_status] ?? $this->contract_status;
    }

    public static function statusOptions(): array
    {
        return [
            self::STATUS_ACTIVE => 'Aktif',
            self::STATUS_ENDED => 'Tamat',
        ];
    }
}
