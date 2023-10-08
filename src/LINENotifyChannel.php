<?php

namespace NotificationChannels\LINENotify;

use NotificationChannels\LINENotify\Exceptions\CouldNotSendNotification;
use Illuminate\Notifications\Notification;

class LINENotifyChannel
{
    public function __construct()
    {
        // Initialisation code here
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws \NotificationChannels\LINENotify\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toLINENotify($notifiable);

        if (is_string($message)) {
            $message = LINENotifyMessage::create($message);
        }

        if (!$to = $notification->routeNotificationForLINENotify($notifiable)) {
            throw CouldNotSendNotification::missingRecipient();
        }

        $response = $message->to($to)->send();

        return json_decode($response->getBody()->getContents(), true);
    }
}
