<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class TipController extends Controller
{
    protected $tips = [
        "Keep common areas clean and welcoming.",
        "Communicate clearly to avoid misunderstandings.",
        "Set clear rental payment deadlines.",
        "Ensure safety measures are always followed.",
        "Maintain good relations with your tenants.",
    ];

    public function getDailyTip(): JsonResponse
    {
        $tip = $this->tips[array_rand($this->tips)];
        return response()->json(['daily_tip' => $tip]);
    }
}
