<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessProductJob;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index(Request $request)
    {
        // 1. Dispatch Job vào Queue
        // Job này sẽ chạy ngầm, không làm treo trình duyệt của người dùng
        ProcessProductJob::dispatch();

        // 2. Trả về thông báo ngay lập tức
        return response()->json([
            'status' => 'success',
            'message' => 'Job đã được đưa vào hàng đợi! Vui lòng chạy lệnh [php artisan queue:work] để thực thi.'
        ]);
    }
}
