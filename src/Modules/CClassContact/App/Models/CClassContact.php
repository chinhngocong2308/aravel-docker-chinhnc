<?php

namespace Modules\CClassContact\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CClassContact\Database\factories\CClassContactFactory;
use Modules\Company\App\Models\Company;

/**
 * Class CClassContact
 * @package Modules\CClassContact\App\Models
 */
class CClassContact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'company_id',
        'fullname',
        'position',
        'contact_link',
    ];

    protected static function newFactory(): CClassContactFactory
    {
        //return CClassContactFactory::new();
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
