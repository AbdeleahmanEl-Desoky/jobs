<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Models;

use BasePackage\Shared\Traits\UuidTrait; // Assuming this trait generates UUIDs for 'id'
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CoreUser\ApplyJob\Database\factories\ApplyJobFactory;
use BasePackage\Shared\Traits\BaseFilterable;
use Modules\CoreCompany\Company\Models\Company;
use Modules\CoreCompany\Job\Models\EmployeeJob;
use Modules\CoreUser\User\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class ApplyJob extends Model implements HasMedia
{
    use HasFactory;
    use UuidTrait;
    use BaseFilterable;
    use InteractsWithMedia;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'company_id',
        'user_id',
        'employee_job_id',
        'cover_letter',
        'agree_privacy_policy',
        'agree_future_job',
    ];

    protected $casts = [
        'id' => 'string',
        'company_id' => 'string', // Ensure UUID is handled as string
        'agree_privacy_policy' => 'boolean', // Cast tinyInteger to boolean
        'agree_future_job' => 'boolean',     // Cast tinyInteger to boolean
    ];

    protected static function newFactory(): ApplyJobFactory
    {
        return ApplyJobFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employeeJob()
    {
        return $this->belongsTo(EmployeeJob::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
