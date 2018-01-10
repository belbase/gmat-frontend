<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
      if ($exception instanceof NotFoundHttpException) {
          if ($request->expectsJson()) {
              return response()->json(['error' => 'Not Found'], 404);
          }
          return response()->view('error.404', [
            'title'=>" 404 Not Found",
            'description'=>"Sorry, the page you are looking for could not be found.",
          ], 404);
      }
      elseif ($exception instanceof ModelNotFoundException) {
          if ($request->expectsJson()) {
              return response()->json(['error' => 'Not Found'], 404);
          }
          return response()->view('error.404', [
            'title'=>" 404 Model Not Found",
            'description'=>"Sorry, the data you are looking for could not be found in Database.",
          ], 404);
      }
        return parent::render($request, $exception);
    }
}
