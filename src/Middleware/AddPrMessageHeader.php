<?php

namespace Naotty\LaravelPrMessage\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddPrMessageHeader
{
    /**
     * PRメッセージのリスト
     *
     * @var array
     */
    protected $messages = [
        'Would you like to work with us? We are hiring engineers!',
        'Let\'s create better services together',
        'Would you like to grow with us?',
        'Looking for a challenging environment? Join us!',
    ];

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
     * メッセージを設定する
     *
     * @param array $messages
     * @return void
     */
    public function setMessages(array $messages)
    {
        $this->messages = $messages;
    }
} 