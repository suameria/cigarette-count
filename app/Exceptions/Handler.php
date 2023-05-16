<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($request->is('api/*')) {
            return $this->apiErrorResponse($request, $e);
        }


        return parent::render($request, $e);
    }

    private function apiErrorResponse($request, $e)
    {
        if ($this->isHttpException($e)) {
            $statusCode = $e->getStatusCode();

            switch ($statusCode) {
                case 400:
                    return response()->error(Response::HTTP_BAD_REQUEST, 'Bad Request');
                case 401:
                    return response()->error(Response::HTTP_UNAUTHORIZED, 'Unauthorized');
                case 403:
                    return response()->error(Response::HTTP_FORBIDDEN, 'Forbidden');
                case 404:
                    return response()->error(Response::HTTP_NOT_FOUND, 'Not Found');
            }
        }
    }
}
