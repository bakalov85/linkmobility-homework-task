<?php
namespace App\EventSubscriber;

use ApiPlatform\Symfony\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

/**
 * If we have an error, return status code 200 and the real status code in a new 'code' property in the JSON
 */
final class StatusCodeSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::RESPONSE => ['changeStatusCode', EventPriorities::POST_RESPOND],
        ];
    }

    public function changeStatusCode(ResponseEvent $event): void
    {
        $response = $event->getResponse();
        $statusCode = $response->getStatusCode();
        $content = json_decode($response->getContent());

        if ($statusCode >= 300) {
            $response->setStatusCode(200);
            $content->code = $statusCode;
            $response->setContent(json_encode($content));
        } 
    }
}