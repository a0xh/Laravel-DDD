<?php declare(strict_types=1);

namespace Core\Common\Auth\Infrastructure\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Core\Shared\Domain\Entity\User;

final class EmailVerifyNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private readonly private(set) User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(User $user): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(User $user): MailMessage
    {
        $hash = $user->getEmail()->asString() . '|' . $user->getId()->asString();

        return new MailMessage()
            ->greeting(greeting: 'Hello!')
            ->line(line: 'Please confirm your email address.')
            ->action(text: 'Confirm Email', url: URL::temporarySignedRoute(
                name: 'auth.verify',
                expiration: now()->addMinutes(60),
                parameters: [
                    'id' => $user->getId()->asString(),
                    'hash' => hash_hmac('sha256', $hash, config('app.key'))
                ]
            ))->line(line: 'Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(User $user): array
    {
        return [
            'type' => 'email_verification',
            'message' => 'Please confirm your email address.',
            'url' => URL::temporarySignedRoute(
                name: 'auth.verify',
                expiration: now()->addMinutes(60),
                parameters: [
                    'id' => $user->getId()->asString(),
                    'hash' => hash_hmac('sha256', $hash, config('app.key'))
                ]
            ),
            'user_id' => $user->getId()->asString(),
            'created_at' => now(),
        ];
    }
}
