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
            $table->string('date')->nullable()->comment('日期');//1
            $table->string('order_number')->nullable()->comment('订单编号');//2
            $table->string('buyer_nickname')->nullable()->comment('购买人昵称');//3
            $table->string('goods_name')->nullable()->comment('产品名称');//4
            $table->string('goods_num')->nullable()->comment('数量');//5
            $table->string('loan_cost')->nullable()->comment('贷款成本');//6
            $table->string('prediction_of_express_packaging')->nullable()->comment('快递包装预估');//7
            $table->string('estimated_cost')->nullable()->comment('预估成本');//8
            $table->string('total_sum')->nullable()->comment('总金额');//9
            $table->string('actual_payment')->nullable()->comment('实际支付');//10
            $table->string('profit_forecast')->nullable()->comment('利润预估');//11
            $table->string('refund_amount')->nullable()->comment('退款金额');//12
            $table->string('order_state')->nullable()->comment('订单状态');//13
            $table->string('channel')->nullable()->comment('渠道');//14
            $table->string('payment_method')->nullable()->comment('支付方式');//15
            $table->string('payment_number')->nullable()->comment('支付宝支付单号');
            $table->string('payment_date_one')->nullable()->comment('收入时间1');//16
            $table->string('amount_of_account_payable_one')->nullable()->comment('收入金额1');
            $table->string('payment_date_two')->nullable()->comment('收入时间2');
            $table->string('refund')->nullable()->comment('退款金额');
            $table->string('payment_date_three')->nullable()->comment('收入时间3');
            $table->string('amount_of_account_payable_three')->nullable()->comment('收入金额3');
            $table->string('account_statement')->nullable()->comment('到账说明');
            $table->string('accounting_time_one')->nullable()->comment('支出时间1');
            $table->string('amount_of_account_one')->nullable()->comment('支出金额1');
            $table->string('accounting_time_two')->nullable()->comment('支出时间2');
            $table->string('taobao_customer_return_point')->nullable()->comment('淘宝客返点');
            $table->string('service_fee_for_head_of_regiment')->nullable()->comment('服务费(团长)');
            $table->string('credit_card_time')->nullable()->comment('信用卡时间');
            $table->string('service_fee_for_card')->nullable()->comment('服务费(信用卡)');
            $table->string('body_plan_time_four')->nullable()->comment('宝贝计划时间4');
            $table->string('amount_of_account_four')->nullable()->comment('支出金额4');
            $table->string('freight_insurance_time_five')->nullable()->comment('运费险时间5');
            $table->string('amount_of_account_five')->nullable()->comment('支出金额5');
            $table->string('accounting_time_six')->nullable()->comment('支出时间6');
            $table->string('amount_of_account_six')->nullable()->comment('支出金额6');
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
