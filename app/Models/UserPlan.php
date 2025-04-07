<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'plan_name', 'features'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
