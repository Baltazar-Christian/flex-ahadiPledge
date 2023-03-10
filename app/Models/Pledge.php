<?php

namespace App\Models;

use App\Models\Purpose;
use App\Models\PledgeType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Pledge extends Model implements Auditable
{
    use HasFactory;
    use AuditableTrait;
    
    protected $table= 'pledges';
    protected $fillable = [
        'type_id',
        'user_id',
        'purpose_id',
        'name',
        'amount',
        'description',
        'deadline',
        'status',
        'created_by'
   
    ];

    public function type()
    {
        return $this->belongsTo(PledgeType::class, 'type_id','id');
    }

    public function purpose()
    {
        return $this->belongsTo(Purpose::class, 'purpose_id','id');
    }
    // for relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
       // for formatted date 
       public function getFormattedDateAttribute()
       {
           return $this->created_at->format('Y-M-d');
       }
       
       protected $appends = ['formattedDate'];
}
