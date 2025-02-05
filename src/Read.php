<?php

declare(strict_types=1);

namespace Finller\Conversation;

use Carbon\Carbon;
use Finller\Conversation\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;

/**
 * @template TUser of User
 * @template TMessage of Message
 *
 * @property int $id
 * @property ?string $origin
 * @property int $message_id
 * @property TMessage $message
 * @property int $user_id
 * @property TUser $user
 * @property Carbon $updated_at
 * @property Carbon $created_at
 */
class Read extends Model
{
    use HasUuid;

    protected $guarded = [];

    /**
     * @return class-string<TUser>
     */
    public static function getModelUser(): string
    {
        return config()->string('conversations.model_user');
    }

    /**
     * @return BelongsTo<TUser, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(static::getModelUser());
    }

    /**
     * @return class-string<TMessage>
     */
    public static function getModelMessage(): string
    {
        return config()->string('conversations.model_message');
    }

    /**
     * @return BelongsTo<TMessage, $this>
     */
    public function message(): BelongsTo
    {
        return $this->belongsTo(static::getModelMessage());
    }
}
