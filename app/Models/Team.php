<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'original_name',
        'country',
        'summary',
        'description',
        'logo',
        'user_id'
    ];

    public function setLogoAttribute($value)
    {
        if ($value && method_exists($value, 'getClientOriginalExtension')) {
            $filename = $value->store('images', 'public');
            $this->attributes['logo'] = $filename;
        }
        else
        {
            $this->attributes['logo'] = $value;
        }
    }

    public function getIsFriendRecordAttribute()
    {
        return Auth::user()->isFriendsWith($this->user);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function homeGames()
    {
        return $this->hasMany(Game::class, 'home_team_id');
    }

    public function awayGames()
    {
        return $this->hasMany(Game::class, 'away_team_id');
    }

    public function allGames()
    {
        return $this->hasMany(Game::class, 'home_team_id')
            ->unionAll($this->hasMany(Game::class, 'away_team_id'));
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($team) {
            $currentUser = auth()->user();

            if (!$currentUser->is_admin && $team->user_id !== $currentUser->id) {
                abort(403, 'Вы можете редактировать только свои команды.');
            }
        });

        static::deleting(function ($team) {
            $currentUser = auth()->user();

            if (!$currentUser->is_admin && $team->user_id !== $currentUser->id) {
                abort(403, 'Вы можете удалять только свои команды.');
            }
        });

        static::restoring(function ($team) {
            $currentUser = auth()->user();

            if (!$currentUser->is_admin) {
                abort(403, 'Только администратор может восстанавливать команды.');
            }
        });
    }
}
