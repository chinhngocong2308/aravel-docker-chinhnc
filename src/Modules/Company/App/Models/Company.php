<?php

namespace Modules\Company\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Company\Database\factories\CompanyFactory;
use Modules\Job\App\Models\Job;
use Modules\CClassContact\App\Models\CClassContact;

/**
 * Class Company
 * @package Modules\Company\App\Models
 */
class Company extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'company_name',
        'industry',
        'logo_image',
        'company_size',
        'number_of_followers',
        'location',
        'description',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cclasscontact()
    {
        return $this->hasMany(CClassContact::class);
    }
}
