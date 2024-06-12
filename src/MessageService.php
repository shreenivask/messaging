<?php

namespace Shreenivask\Messaging;

interface MessageService
{
    public function sendMessage(string $message, string $to, string $type): array;
}