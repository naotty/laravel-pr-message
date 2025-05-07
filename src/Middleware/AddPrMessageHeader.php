<?php

namespace Naotty\LaravelPrMessage\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddPrMessageHeader
{
    /**
     * List of PR messages
     *
     * @var array
     */
    protected $messages = [];

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
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
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
     * @param array $messages
     * @return void
     */
    public function setMessages(array $messages)
    {
        $this->messages = $messages;
    }
} 