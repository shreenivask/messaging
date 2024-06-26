<?php

namespace Shreenivask\Messaging;

use Exception;
use Twilio\Rest\Client;
use Shreenivask\Messaging\MessageService;

class TwilioMessageService implements MessageService
{
    protected $client;

    protected $from;

    /**
     * Contsructor
     */
    public function __construct($sid, $token, $from)
    {
        $this->client = new Client($sid, $token);
        $this->from = $from;
    }

    /**
     * Send message from Twilio API
     */
    public function sendMessage(string $message, string $to, string $type): array
    {
        $response = array();

        try {
            $from = $this->from;
            $numberType = (!empty($type) && $type == "whatsapp") ? $type . ":" : "";

            $message = $this->client->messages
                ->create(
                    $numberType . $to,
                    array(
                        "from" => $numberType . $from,
                        "body" => $message
                    )
                );

            $responseMessage = "Message sent successfully. Response status: " . $message->status . ", sid: " . $message->sid;
            $response = array('staus' => 'success', 'message' => $responseMessage);
        } catch (Exception $e) {
            $responseMessage = "Message send failed. Error : " . $e->getMessage();
            $response = array('staus' => 'failure', 'message' => $responseMessage);
        }

        return $response;
    }
}
