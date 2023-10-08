<?php

namespace NotificationChannels\LINENotify\Exceptions;

class CouldNotSendNotification extends \Exception
{
    public static function missingRecipient()
    {
        return new static("Please provide a recipient for your notification.");
    }
}
