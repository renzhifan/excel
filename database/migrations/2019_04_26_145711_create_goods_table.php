<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('自增主键ID');
            $table->string('date')->nullable()->comment('日期');
            $table->string('order_number')->nullable()->comment('订单编号');
            $table->string('buyer_nickname')->nullable()->comment('购买人昵称');
            $table->string('goods_name')->nullable()->comment('产品名称');
            $table->string('goods_num')->nullable()->comment('数量');
            $table->string('loan_cost')->nullable()->comment('贷款成本');
            $table->string('prediction_of_express_packaging')->nullable()->comment('快递包装预估');
            $table->string('estimated_cost')->nullable()->comment('预估成本');
            $table->string('total_sum')->nullable()->comment('总金额');
            $table->string('actual_payment')->nullable()->comment('实际支付');
            $table->string('profit_forecast')->nullable()->comment('利润预估');
            $table->string('refund_amount')->nullable()->comment('退款金额');
            $table->string('order_state')->nullable()->comment('订单状态');
            $table->string('channel')->nullable()->comment('渠道');
            $table->string('payment_method')->nullable()->comment('支付方式');
            $table->string('payment_date_one')->nullable()->comment('到账时间1');
            $table->string('amount_of_account_payable_one')->nullable()->comment('到账金额1');
            $table->string('payment_date_two')->nullable()->comment('到账时间2');
            $table->string('refund')->nullable()->comment('退款');
            $table->string('payment_date_three')->nullable()->comment('到账时间3');
            $table->string('amount_of_account_payable_three')->nullable()->comment('到账金额3');
            $table->string('account_statement')->nullable()->comment('到账说明');
            $table->string('accounting_time_one')->nullable()->comment('出账时间1');
            $table->string('amount_of_account_one')->nullable()->comment('出账金额1');
            $table->string('accounting_time_two')->nullable()->comment('出账时间2');
            $table->string('taobao_customer_return_point')->nullable()->comment('淘宝客返点');
            $table->string('service_fee_for_head_of_regiment')->nullable()->comment('服务费(团长)');
            $table->string('credit_card_time')->nullable()->comment('信用卡时间');
            $table->string('service_fee_for_card')->nullable()->comment('服务费(信用卡)');
            $table->string('accounting_time_four')->nullable()->comment('出账时间4');
            $table->string('amount_of_account_four')->nullable()->comment('出账金额4');
            $table->string('accounting_description')->nullable()->comment('出账说明');
            $table->string('invoice')->nullable()->comment('发票');
            $table->string('remarks')->nullable()->comment('备注');
            $table->string('supplier')->nullable()->comment('供货商');
            $table->string('addressee')->nullable()->comment('收件人');
            $table->string('phone')->nullable()->comment('电话');
            $table->string('receiving_address')->nullable()->comment('收货地址');
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
        Schema::dropIfExists('goods');
    }
}
