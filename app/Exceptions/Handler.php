<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => true,
                    'message' => 'Url tidak diketemukan.'
                ], 404);
            }
        });
		
		$this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => true,
                    'message' => 'Method Tidak diijinkan.'
                ], 405);
            }
        });
        
        $this->renderable(function (HttpException $e, $request) {
            if ($e->getStatusCode() == 419) {
                if ($request->ajax()) {
                    return response()->json([
                        'error' => true,
                        'message' => 'Session telah berakhir.'
                    ], 419);
                }
            }
        }); 
    }
}
