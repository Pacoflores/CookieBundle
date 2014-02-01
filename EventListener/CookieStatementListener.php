<?php

namespace ConWeb\CookieBundle\EventListener;


use Symfony\Bridge\Twig\TwigEngine;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class CookieStatementListener
{
    /** @var  TwigEngine */
    private $templateEngine;

    /** @var  Session */
    private $session;

    /** @var  string */
    private $template;

    public function __construct(TwigEngine $templateEngine, Session $session, $template)
    {
        $this->templateEngine = $templateEngine;
        $this->session        = $session;
        $this->template       = $template;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $response = $event->getResponse();
        $request  = $event->getRequest();

        $accepted = $request->cookies->get('cookie_agree', 0);

        $cookieStatementPart = $this->templateEngine->render(
            $this->template,
            ['accepted' => $accepted]
        );

        $content = $response->getContent();

        $content = str_replace('</body>', $cookieStatementPart . '</body>', $content);
        $response->setContent($content);

        $event->setResponse($response);

    }
} 