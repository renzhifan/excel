<?php

use Maatwebsite\Excel\Excel;

return [

    'exports' => [

        /*
        |--------------------------------------------------------------------------
        | Chunk size
        |--------------------------------------------------------------------------
        |
        | When using FromQuery, the query is automatically chunked.
        | Here you can specify how big the chunk should be.
        |
        */
        'chunk_size' => 1000,

        /*
       |--------------------------------------------------------------------------
       | Pre-calculate formulas during export
       |--------------------------------------------------------------------------
       */
        'pre_calculate_formulas' => false,

        /*
        |--------------------------------------------------------------------------
        | CSV Settings
        |--------------------------------------------------------------------------
        |
        | Configure e.g. delimiter, enclosure and line ending for CSV exports.
        |
        */
        'csv' => [
            'delimiter' => ',',
            'enclosure' => '"',
            'line_ending' => PHP_EOL,
            'use_bom' => false,
            'include_separator_line' => false,
            'excel_compatibility' => false,
        ],
    ],

    'imports' => [

        'read_only' => true,

        'heading_row' => [

            /*
            |--------------------------------------------------------------------------
            | Heading Row Formatter
            |--------------------------------------------------------------------------
            |
            | Configure the heading row formatter.
            | Available options: none|slug|custom
            |
            */
            'formatter' => 'slug',
        ],

        /*
        |--------------------------------------------------------------------------
        | CSV Settings
        |--------------------------------------------------------------------------
        |
        | Configure e.g. delimiter, enclosure and line ending for CSV imports.
        |
        */
        'csv' => [
            'delimiter' => ',',
            'enclosure' => '"',
            'line_ending' => PHP_EOL,
            'use_bom' => false,
            'include_separator_line' => false,
            'excel_compatibility' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Extension detector
    |--------------------------------------------------------------------------
    |
    | Configure here which writer type should be used when
    | the package needs to guess the correct type
    | based on the extension alone.
    |
    */
    'extension_detector' => [
        'xlsx' => Excel::XLSX,
        'xlsm' => Excel::XLSX,
        'xltx' => Excel::XLSX,
        'xltm' => Excel::XLSX,
        'xls' => Excel::XLS,
        'xlt' => Excel::XLS,
        'ods' => Excel::ODS,
        'ots' => Excel::ODS,
        'slk' => Excel::SLK,
        'xml' => Excel::XML,
        'gnumeric' => Excel::GNUMERIC,
        'htm' => Excel::HTML,
        'html' => Excel::HTML,
        'csv' => Excel::CSV,
        'tsv' => Excel::TSV,

        /*
        |--------------------------------------------------------------------------
        | PDF Extension
        |--------------------------------------------------------------------------
        |
        | Configure here which Pdf driver should be used by default.
        | Available options: Excel::MPDF | Excel::TCPDF | Excel::DOMPDF
        |
        */
        'pdf' => Excel::DOMPDF,
    ],

    'value_binder' => [

        /*
        |--------------------------------------------------------------------------
        | Default Value Binder
        |--------------------------------------------------------------------------
        |
        | PhpSpreadsheet offers a way to hook into the process of a value being
        | written to a cell. In there some assumptions are made on how the
        | value should be formatted. If you want to change those defaults,
        | you can implement your own default value binder.
        |
        */
        'default' => Maatwebsite\Excel\DefaultValueBinder::class,
    ],

    'transactions' => [

        /*
        |--------------------------------------------------------------------------
        | Transaction Handler
        |--------------------------------------------------------------------------
        |
        | By default the import is wrapped in a transaction. This is useful
        | for when an import may fail and you want to retry it. With the
        | transactions, the previous import gets rolled-back.
        |
        | You can disable the transaction handler by setting this to null.
        | Or you can choose a custom made transaction handler here.
        |
        | Supported handlers: null|db
        |
        */
        'handler' => 'db',
    ],

    'temporary_files' => [

        /*
        |--------------------------------------------------------------------------
        | Local Temporary Path
        |--------------------------------------------------------------------------
        |
        | When exporting and importing files, we use a temporary file, before
        | storing reading or downloading. Here you can customize that path.
        |
        */
        'local_path' => sys_get_temp_dir(),

        /*
        |--------------------------------------------------------------------------
        | Remote Temporary Disk
        |--------------------------------------------------------------------------
        |
        | When dealing with a multi server setup with queues in which you
        | cannot rely on having a shared local temporary path, you might
        | want to store the temporary file on a shared disk. During the
        | queue executing, we'll retrieve the temporary file from that
        | location instead. When left to null, it will always use
        | the local path. This setting only has effect when using
        | in conjunction with queued imports and exports.
        |
        */
        'remote_disk' => null,

    ],
    'header' => [
        'id' => '序号',
        'date' => '日期',//1
        'order_number' => '订单编号',//2
        'buyer_nickname' => '购买人昵称',//3
        'goods_name' => '产品名称',//4
        'goods_num' => '数量',//5
        'loan_cost' => '贷款成本',//6
        'prediction_of_express_packaging' => '快递包装预估',//7
        'estimated_cost' => '预估成本',//8
        'total_sum' => '总金额',//9
        'actual_payment' => '实际支付',//10
        'profit_forecast' => '利润预估',//11
        'refund_amount' => '退款金额',//12
        'order_state' => '订单状态',//13
        'channel' => '渠道',//14
        'payment_method' => '支付方式',//15
        'payment_date_one' => '收入时间1',//16
        'amount_of_account_payable_one' => '收入金额1',
        'payment_date_two' => '收入时间2',
        'refund' => '退款金额',
        'payment_date_three' => '收入时间3',
        'amount_of_account_payable_three' => '收入金额3',
        'account_statement' => '到账说明',
        'accounting_time_one' => '支出时间1',
        'amount_of_account_one' => '支出金额1',
        'accounting_time_two' => '支出时间2',
        'taobao_customer_return_point' => '淘宝客返点',
        'service_fee_for_head_of_regiment' => '服务费(团长)',
        'credit_card_time' => '信用卡时间',
        'service_fee_for_card' => '服务费(信用卡)',
        'body_plan_time_four' => '宝贝计划时间4',
        'amount_of_account_four' => '支出金额4',
        'freight_insurance_time_five' => '运费险时间5',
        'amount_of_account_five' => '支出金额5',
        'accounting_time_six' => '支出时间6',
        'amount_of_account_six' => '支出金额6',
        'accounting_description' => '出账说明',
        'invoice' => '发票',
        'remarks' => '备注',
        'supplier' => '供货商',
        'addressee' => '收件人',
        'phone' => '电话',
        'receiving_address' => '收货地址',
    ],
];
