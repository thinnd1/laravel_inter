<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProcessProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Giả lập xử lý nặng (ví dụ đợi 5 giây)

        // Tạo 1 record fix cứng
        $name = 'Sản phẩm từ Queue ' . rand(1, 100);

        DB::table('products')->insert([
            'name'           => $name,
            'slug'           => Str::slug($name) . '-' . Str::random(5),
            'price'          => 99000,
            'stock_quantity' => 10,
            'is_active'      => true,
            'created_at'     => Carbon::now(), // Query Builder không tự thêm cái này
            'updated_at'     => Carbon::now(),
        ]);
    }
}
