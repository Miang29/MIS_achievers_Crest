<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;

use Exception;
use Log;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}
            
            public function report(Exception $e)
            {
                Log::error("[TestCase ERROR]", [$e]);
            }
            
            public function render($request, Exception $e) {
                if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) {
                    return new Response(null, Response::HTTP_NOT_FOUND);
                }
                if ($e instanceof UnauthorizedHttpException) {
                    return new Response(null, Response::HTTP_UNAUTHORIZED);
                }
                if ($e instanceof AuthenticationException) {
                    return new Response(null, Response::HTTP_UNAUTHORIZED);
                }
                if ($e instanceof ValidationException) {
                    return parent::render($request, $e);
                }
                throw $e;
            }
        });
    }
}
