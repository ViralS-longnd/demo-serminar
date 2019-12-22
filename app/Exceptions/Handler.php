<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Traits\ApiResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use function Psy\debug;

class Handler extends ExceptionHandler
{
    use ApiResponse;
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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
//        if ($exception instanceof ModelNotFoundException) {
//            $model = strtolower(class_basename($exception->getModel()));
//            Log::info("Dose not exist any instance of {$model} with the given id");
//        }
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
//        $isApiCall = (strpos($request->getUri(), '/api') !== false);
//        if ($isApiCall) {
//            $request->headers->set('X-Requested-With', 'XMLHttpRequest');
//        }
//        if ($exception instanceof ModelNotFoundException) {
//            $model = strtolower(class_basename($exception->getModel()));
//
//            return $this->sendError("Dose not exist any instance of {$model} with the given id", Response::HTTP_NOT_FOUND);
//        }
//
//        if ($exception instanceof AuthenticationException) {
//            return $this->sendError($exception->getMessage(), Response::HTTP_FORBIDDEN);
//        }
//
//        if ($exception instanceof AuthorizationException) {
//            return $this->sendError($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
//        }
//
//        if ($exception instanceof ValidationException) {
//            $error = $exception->validator->errors()->getMessages();
//            return $this->sendError($error, Response::HTTP_UNPROCESSABLE_ENTITY);
//        }


        return parent::render($request, $exception);
    }
}
