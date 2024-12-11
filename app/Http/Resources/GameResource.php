<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'home_team_id' => $this->homeTeam,
            'away_team_id' => $this->awayTeam,
            'stadium_name' => $this->stadium_name,
            'match_date' => $this->match_date,
            'is_friend_record' => $this->user->isFriendsWith(Auth::user())
        ];
    }
}
