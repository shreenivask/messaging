<?php

namespace Shreenivask\Messaging;

use Shreenivask\Messaging\Models\Twilio;
use Shreenivask\Messaging\TwilioMessageService;

class WhatsappMessageService
{
    /**
     * Send Whatsapp message service
     */
    public function sendMessage(string $message, string $to, string $type = "whatsapp", Twilio $twilio): array
    {
        $sid = $twilio->getSid();
        $token = $twilio->getToken();
        $from = $twilio->getFrom();

        $twilioService = new TwilioMessageService($sid, $token, $from);
        $response = $twilioService->sendMessage($message, $to, $type);

        return $response;
    }
}
