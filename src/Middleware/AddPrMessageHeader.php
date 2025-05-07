<?php

namespace YourVendor\PrMessageMiddleware\Middleware;

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
        '一緒に働きませんか？エンジニア募集中です！',
        'より良いサービスを一緒に作りましょう',
        '私たちと一緒に成長しませんか？',
        'チャレンジングな環境で働きたい方、募集中！',
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