<?php

namespace App\Domains\Contacts\Controllers;

use App\Domains\Contacts\Services\ContactServiceInterface;
use App\Domains\Utils\Constants\CommonErrorCodeConstants;
use App\Http\Controllers\Controller;
use App\Mail\NewContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class ContactController extends Controller
{
    public function __construct(private ContactServiceInterface $contactService){

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string|max:65533',
        ]);

        if($validator->fails()) {
            return response()->json([
                'code' => CommonErrorCodeConstants::CODE_MISSING_REQUIRED_PARAM,
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            $contact = $this->contactService->create($request->all());
            $this->sendMail($contact);
        }catch (Exception $exception) {
            Log::error('Contact Us Error' . $exception);
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    private function sendMail($contact): void
    {
        Mail::to('tjsk002@naver.com')
            ->cc([])->send(new NewContactUs($contact));
    }
}