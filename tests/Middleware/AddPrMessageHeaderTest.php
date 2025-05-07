<?php

namespace Naotty\LaravelPrMessage\Tests\Middleware;

use Orchestra\Testbench\TestCase;
use Naotty\LaravelPrMessage\Middleware\AddPrMessageHeader;
use Naotty\LaravelPrMessage\PrMessageMiddlewareServiceProvider;
class AddPrMessageHeaderTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [PrMessageMiddlewareServiceProvider::class];
    }

    /** @test */
    public function it_adds_pr_message_header_to_response()
    {
        $middleware = new AddPrMessageHeader();
        
        $response = $middleware->handle(
            request(),
            fn () => response()->json(['data' => 'test'])
        );

        $this->assertTrue($response->headers->has('pr-message'));
    }

    /** @test */
    public function it_can_set_custom_messages()
    {
        $middleware = new AddPrMessageHeader();
        $customMessages = ['カスタムメッセージ1', 'カスタムメッセージ2'];
        
        $middleware->setMessages($customMessages);
        
        $response = $middleware->handle(
            request(),
            fn () => response()->json(['data' => 'test'])
        );

        $this->assertTrue(in_array(
            $response->headers->get('pr-message'),
            $customMessages
        ));
    }

    /** @test */
    public function it_registers_middleware_alias()
    {
        $router = $this->app['router'];
        $middlewareMap = $router->getMiddleware();
        
        $this->assertArrayHasKey('pr-message', $middlewareMap);
        $this->assertEquals(AddPrMessageHeader::class, $middlewareMap['pr-message']);
    }
} 