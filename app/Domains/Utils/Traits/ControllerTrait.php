<?php

namespace App\Domains\Utils\Traits;

use App\Domains\Utils\Constants\CommonErrorCodeConstants;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

trait ControllerTrait
{
    public function successResponse($result, string $message = "Success"): JsonResponse
    {
        return response()->json([
            'code'    => "0000", // 고정
            'message' => $message,
            'result'  => $result
        ], 200);
    }

    public function errorResponse(
        string $message,
               $resultCode,
               $statusCode,
        array $appendResult = []
    ): JsonResponse {
        return response()->json([
            'code'    => $resultCode,
            'message' => $message,
            'result'  => $appendResult
        ], $statusCode);
    }

    /**
     * @param string $message
     * @param string $resultCode
     * @param array  $appendResult
     *
     * @return JsonResponse
     */
    public function forbiddenErrorResponse(
        string $message,
        string $resultCode,
        array $appendResult = []
    ): JsonResponse {
        return $this->errorResponse($message, $resultCode, 403, $appendResult);
    }

    /**
     * @return JsonResponse
     */
    public function notFoundErrorResponse(): JsonResponse
    {
        return $this->errorResponse('Not found.', 'NOT_FOUND', 404);
    }

    /**
     * @param string $message
     * @param string $resultCode
     * @param array  $appendResult
     *
     * @return JsonResponse
     */
    public function badRequestErrorResponse(
        string $message,
        string $resultCode,
        array $appendResult = []
    ): JsonResponse {
        return $this->errorResponse($message, $resultCode, 400, $appendResult);
    }

    /**
     * 시스템 내부에서는 Field 로 표현하지만 외부에서는 Parameter 표현 사용
     *
     * @param string $message
     *
     * @return JsonResponse
     */
    public function requiredFieldsErrorResponse(string $message): JsonResponse
    {
        return response()->json([
            'code'    => 'MISSING_REQUIRED_PARAM',
            'message' => $message,
        ], 400); // 400 고정
    }

    /**
     * @param string $message
     *
     * @return JsonResponse
     */
    public function notAuthorizedResponse(string $message = 'Not authorized'): JsonResponse
    {
        return $this->errorResponse($message, 9999, 403);
    }

    /**
     * @param string $message
     *
     * @return RedirectResponse
     */
    public function successBackResponse(string $message = "Success"): RedirectResponse
    {
        return back()->with('success', $message);
    }

    /**
     * @param Request $request
     * @param string  $message
     *
     * @return RedirectResponse
     */
    public function successBackWithInputResponse(Request $request, string $message = "Success"): RedirectResponse
    {
        return back()->withInput($request->input())->with([
            'success' => $message,
        ]);
    }

    /**
     * @param string $message
     *
     * @return RedirectResponse
     */
    public function errorBackResponse(string $message = "Failed"): RedirectResponse
    {
        return back()->withErrors([
            'error' => $message,
        ]);
    }

    public function errorBackWithInputResponse(Request $request, string $message = "Failed"): RedirectResponse
    {
        return back()->withInput($request->input())->withErrors([
            'error' => $message,
        ]);
    }

    /**
     * @param Request $request
     * @param         $requiredFields
     *
     * @return JsonResponse|null
     */
    public function httpRequiredFieldsCheck(Request $request, $requiredFields): ?JsonResponse
    {
        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!$request->has($field) || $request->input($field) === null) {
                $missingFields[] = $field;
            }
        }

        if (!empty($missingFields)) {
            return $this->errorResponse(
                'Required field(s) are missing: ' . implode(', ', $missingFields),
                CommonErrorCodeConstants::CODE_MISSING_REQUIRED_PARAM,
                400
            );
        }

        return null;
    }

    /**
     * 허용된 필터만 가공해주기
     *
     * @param Request $request
     * @param array   $availableKeys
     *
     * @return array
     */
    public function refineFilteredData(Request $request, array $availableKeys = []): array
    {
        if (!$request->has('filters') || empty($availableKeys)) {
            return [];
        }

        $filters = $request->input('filters');
        return array_filter(
            $filters,
            fn($value, $key) => in_array($key, $availableKeys),
            ARRAY_FILTER_USE_BOTH
        );
    }
}