<?php

namespace NotificationChannels\LINENotify;

use Illuminate\Support\Facades\Http;

class LINENotifyMessage
{
    protected $text;
    protected $to;

    public function __construct(string $text = '')
    {
        $this->text = $text;
    }

    public function create(string $text)
    {
        return new static($text);
    }

    public function to(string $to)
    {
        $this->to = $to;
        return $this;
    }

    public function send()
    {
        return Http::asForm()->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer ' . $this->to,
        ])->post('https://notify-api.line.me/api/notify', [
            'message' => $this->text,
        ]);
    }
}
