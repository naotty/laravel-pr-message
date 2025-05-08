<?php

namespace Naotty\LaravelPrMessage\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddPrMessageHeader
{
    /**
     * List of PR messages
     *
     * @var array<int, string>
     */
    protected array $messages = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messages = config('pr-message.messages', []);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        if (!empty($this->messages)) {
            $randomMessage = $this->messages[array_rand($this->messages)];
            $response->headers->set('pr-message', $randomMessage);
        }
        
        return $response;
    }

    /**
     * Set the messages
     *
     * @param array<int, string> $messages
     * @return void
     */
    public function setMessages(array $messages): void
    {
        $this->messages = $messages;
    }
} 