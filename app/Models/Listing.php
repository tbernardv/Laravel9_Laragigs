<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $table = "tbllistings";

    protected $fillable = [
        'user_id',
        'title',
        'logo',
        'tags',
        'company',
        'location',
        'email',
        'website',
        'description'
    ];

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%'.request('tag').'%');
        }

        if($filters['txtsearch'] ?? false){
            $query->where('title', 'like', '%'.request('txtsearch').'%')
                ->orWhere('description', 'like', '%'.request('txtsearch').'%')
                ->orWhere('tags', 'like', '%'.request('txtsearch').'%');
        }
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
