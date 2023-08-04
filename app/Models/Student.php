<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

//    public mixed $standard_id;
//    public mixed $name;
    protected $fillable = ['name', 'student_id','address_1','address_2','standard_id'];

    /**
     * @return BelongsTo
     */
    public function standard(): BelongsTo
    {
        return $this->belongsTo(Standard::class);
    }

    /**
     * @return BelongsToMany
     */
    public function guardians(): belongsToMany
    {
        return $this->belongsToMany(Guardian::class);
    }
}
