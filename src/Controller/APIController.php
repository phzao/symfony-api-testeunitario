<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class APIController
 * @package App\Controller
 */
class APIController
{
    /**
     * @var integer HTTP status code - 200 (OK) by default
     */
    protected $statusCode = 200;

    /**
     * Gets the value of statusCode.
     *
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Sets the value of statusCode.
     *
     * @param integer $statusCode the status code
     *
     * @return self
     */
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param       $data
     * @param array $headers
     *
     * @return JsonResponse
     */
    public function respond($data, $headers = [])
    {
        $response = [
            'status' => 'success',
            'data'   => $data
        ];

        return new JsonResponse($response,
                                $this->statusCode,
                                $headers);
    }

    /**
     * @param string $errors
     * @param array  $headers
     *
     * @return JsonResponse
     */
    public function respondWithErrors(string $errors, $headers = [])
    {
        $errors = json_decode($errors, true);

        return new JsonResponse($errors, $this->statusCode, $headers);
    }

    /**
     * @param string $message
     *
     * @return JsonResponse
     */
    public function respondValidationError(string $message)
    {
        $errors          = json_decode($message, true);
        $error['status'] = 'fail';
        $error['data']   = $errors;
        $jsonMessage     = json_encode($error, true);

        return $this
                    ->setStatusCode(422)
                    ->respondWithErrors($jsonMessage);
    }

    /**
     * @return JsonResponse
     */
    public function respondUpdatedResource()
    {
        return $this
                    ->setStatusCode(204)
                    ->respond([]);
    }

    /**
     * @param array $data
     *
     * @return JsonResponse
     */
    public function respondCreated($data = [])
    {
        return $this
                    ->setStatusCode(201)
                    ->respond($data);
    }

    /**
     * @param string $message
     *
     * @return JsonResponse
     */
    public function respondNotFound($message = 'Not found!')
    {
        return $this
                    ->setStatusCode(404)
                    ->respondWithErrors($message);
    }
}