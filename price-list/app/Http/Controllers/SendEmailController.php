<?php

namespace App\Http\Controllers;
use App\Http\Requests\FeedbackRequest; // Підключення запиту для валідації форми

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class SendEmailController extends Controller
{
    public function send(FeedbackRequest $request) {
        // Валідація даних відбувається в запиті FeedbackRequest,
        // якщо виявляється помилка, далі функція не виконується, а користувач отримує повідомлення про помилку
        
        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        );
        
        Mail::to('my-price-list@ukr.net')->send(new SendEmail($data));

        return redirect()->back()->with('success', 'Ваше повідомлення було отримано.');
    }
}
