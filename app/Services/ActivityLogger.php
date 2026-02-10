<?php // app/Services/ActivityLogger.php
namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ActivityLogger
{
    public static function log(
        string $action,
        ?Model $subject = null,
        ?array $properties = null,
        ?string $description = null,
        ?int $userId = null,
        ?Request $request = null
    ): ActivityLog {
        $req = $request ?? request();

        return ActivityLog::create([
            'user_id'     => $userId ?? optional(auth()->user())->id,
            'action'      => $action,
            'description' => $description,
            'subject_type'=> $subject?->getMorphClass(),
            'subject_id'  => $subject?->getKey(),
            'properties'  => $properties,
            'ip'          => $req?->ip(),
            'user_agent'  => $req?->userAgent(),
            'url'         => $req?->fullUrl(),
        ]);
    }
}

