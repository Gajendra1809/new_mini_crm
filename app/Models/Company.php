<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $table="companies";

    protected $fillable = ['name','email','logo','website','location'];

    public function employee(){
        return $this->hasMany(Employee::class);
    }


    //for deleting employees if a company is deleted
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($company) {
            $company->employee()->delete();
        });

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
