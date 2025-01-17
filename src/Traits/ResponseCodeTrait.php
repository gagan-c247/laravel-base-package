<?php

namespace C247\Codebank\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseCodeTrait
{
    /**
     * to get data for responseCode
     * @author Gautam Yadav
     * @param int $code  Response code param
     *  @param string $token Response message param
     * @param string|array $data Response data param
     * @param string $message Response message param

     * @return array
     */


    public function getResponseCode($code, $token = null, $data = null, $message = null, $error = null, $errors = null)
    {
        $responseCode = [
            /*
        |---------------------------------------------------------------------
        |SEND TOKEN RESPONSE CODE (OK)[200 OK: The request has succeeded, and the response body contains the requested data.]
        |---------------------------------------------------------------------
        */
            // send Token
            '200' => [
                'token' => $token,
                'message' => $message,
                'data' => $data,
            ],
            /*
        |---------------------------------------------------------------------
        |GENERAL SUCCESS RESPONSE CODE (SUCCESS)[201 Created: The request has been fulfilled and a new resource has been created.]
        |---------------------------------------------------------------------
        */
            '201' => [
                'message' => $message,
                'data' => $data,
            ],
            /*
        |---------------------------------------------------------------------
        | NO CONTENT(Data Base Content Not Available) RESPONSE CODE
        |---------------------------------------------------------------------
        */
            '204' => [
                'message' => $message,
                'data' => $data,
            ],
            /*

        |---------------------------------------------------------------------
        |VALIDATION ERROR RESPONSE CODE
        |---------------------------------------------------------------------
        */
            // 422 Unprocessable Entity: The server understands the request, but the request content (e.g. JSON payload) is invalid or incomplete due to validation errors.
            '422' => [
                'message' => 'Validation error',
                'error' => $message,
                'http_code' => 422,
                'errors' => $errors,
            ],
            // 400 Bad Request: The request was invalid or could not be understood by the server.
            '400' => [
                'message' => 'HTTP_BAD_REQUEST',
                'error' => $message,
                'http_code' => 400
            ],
            // 401 Unauthorized: The request requires user authentication, or the user credentials provided are invalid.
            '401' => [
                'message' => $message,
            ],
            // You don't have permission to access / on this server.

            '403' => [
                'message' => 'HTTP_UNAUTHORIZED',
                'error' => $message,
            ],

            // Not Found

            '404' => [
                'status' => false,
                'message' => $message,
            ],

            // Expired the data
            '410' => [
                'message' => $message,
            ],

            // Token Required
            '499' => [
                'status' => false,
                'message' => 'HTTP_TOKEN_REQUIRED',
                'error' => 'Token Required',
                'http_code' => 499

            ],

            // Data already exists
            '409' => [
                'status' => false,
                'message' => 'Data already exists.',
                'error' => $message,
                'http_code' => 409
            ],
            '500' => [
                'message' => $message,
                'data' => $data,
                'error' => $error
            ],
        ];
        $response = $responseCode[$code] ?? $responseCode['500'];
        return response()->json($response, $code);
    }


    /**
     * Generate JSON response with provided response code and message.
     *
     * @param int $code
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */


    protected function tokenResponse($code, $message, $status = false): JsonResponse
    {
        return response()->json([
            'status' => $status, // true or false
            'response_code' => $code,
            'message' => $message,
            'timestamp' => now()->timestamp,
        ], $code);
    }
}
