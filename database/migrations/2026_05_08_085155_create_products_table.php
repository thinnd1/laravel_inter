<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Thông tin cơ bản
            $table->string('name'); // 2. Tên sản phẩm
            $table->string('slug')->unique(); // 3. Đường dẫn thân thiện (SEO)
            $table->string('sku')->unique()->nullable(); // 4. Mã kho hàng
            
            // Giá và số lượng
            $table->decimal('price', 15, 2)->default(0); // 5. Giá bán
            $table->decimal('old_price', 15, 2)->nullable(); // 6. Giá cũ (để hiển thị giảm giá)
            $table->integer('stock_quantity')->default(0); // 7. Số lượng trong kho
            
            // Nội dung
            $table->text('summary')->nullable(); // 8. Mô tả ngắn
            $table->longText('description')->nullable(); // 9. Chi tiết sản phẩm
            $table->string('thumbnail')->nullable(); // 10. Ảnh đại diện sản phẩm
            
            // Trạng thái & Phân loại
            $table->boolean('is_active')->default(true); // 11. Trạng thái hiển thị
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
