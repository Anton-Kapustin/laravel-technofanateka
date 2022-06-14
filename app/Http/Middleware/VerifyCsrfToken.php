<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/webhook',
        '/telegram/test_webhook',
        '/vkapi/notify',
        '/admin_add_pc_assemble_to_db',
        '/update_assemble_in_db',
        '/News*',
        '/update_news_in_db',
        '/update_user_in_db',
        '/add_accessory_cpu_in_db',
        '/add_accessory_motherboard_in_db',
        '/add_accessory_ram_in_db',
        '/add_accessory_video_in_db',
        '/add_accessory_memory_in_db', 
        '/add_accessory_power_supply_in',
        '/add_accessory_cooller_in_db',
        '/add_accessory_pc_case_in_db',
        '/update_accessory_cpu_in_db',
        '/update_accessory_motherboard_in_db',
        '/update_accessory_ram_in_db',
        '/update_accessory_video_in_db',
        '/update_accessory_memory_in_db', 
        '/update_accessory_power_supply_in',
        '/update_accessory_cooller_in_db',
        '/update_accessory_pc_case_in_db',
        '/delete_accessory_cpu_in_db',
        '/delete_accessory_motherboard_in_db',
        '/delete_accessory_ram_in_db',
        '/delete_accessory_video_in_db',
        '/delete_accessory_memory_in_db', 
        '/delete_accessory_power_supply_in',
        '/delete_accessory_cooller_in_db',
        '/delete_accessory_pc_case_in_db',
        '/changePassword',
    ];
}
