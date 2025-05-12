<?php

namespace Naotty\LaravelPrMessage\Tests\Middleware;

use Naotty\LaravelPrMessage\Middleware\AddPrMessageHeader;
use Naotty\LaravelPrMessage\PrMessageMiddlewareServiceProvider;
use Orchestra\Testbench\TestCase;

class AddPrMessageHeaderTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [PrMessageMiddlewareServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('pr-message.messages', [
            'Test message 1',
            'Test message 2',
        ]);
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
        $this->assertTrue(in_array(
            $response->headers->get('pr-message'),
            config('pr-message.messages')
        ));
    }

    /** @test */
    public function it_can_set_custom_messages()
    {
        $middleware = new AddPrMessageHeader();
        $customMessages = ['Custom message 1', 'Custom message 2'];

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
