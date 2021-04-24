<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'course_create',
            ],
            [
                'id'    => 22,
                'title' => 'course_edit',
            ],
            [
                'id'    => 23,
                'title' => 'course_show',
            ],
            [
                'id'    => 24,
                'title' => 'course_delete',
            ],
            [
                'id'    => 25,
                'title' => 'course_access',
            ],
            [
                'id'    => 26,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 27,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 28,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 29,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 30,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 31,
                'title' => 'test_create',
            ],
            [
                'id'    => 32,
                'title' => 'test_edit',
            ],
            [
                'id'    => 33,
                'title' => 'test_show',
            ],
            [
                'id'    => 34,
                'title' => 'test_delete',
            ],
            [
                'id'    => 35,
                'title' => 'test_access',
            ],
            [
                'id'    => 36,
                'title' => 'question_create',
            ],
            [
                'id'    => 37,
                'title' => 'question_edit',
            ],
            [
                'id'    => 38,
                'title' => 'question_show',
            ],
            [
                'id'    => 39,
                'title' => 'question_delete',
            ],
            [
                'id'    => 40,
                'title' => 'question_access',
            ],
            [
                'id'    => 41,
                'title' => 'question_option_create',
            ],
            [
                'id'    => 42,
                'title' => 'question_option_edit',
            ],
            [
                'id'    => 43,
                'title' => 'question_option_show',
            ],
            [
                'id'    => 44,
                'title' => 'question_option_delete',
            ],
            [
                'id'    => 45,
                'title' => 'question_option_access',
            ],
            [
                'id'    => 46,
                'title' => 'test_result_create',
            ],
            [
                'id'    => 47,
                'title' => 'test_result_edit',
            ],
            [
                'id'    => 48,
                'title' => 'test_result_show',
            ],
            [
                'id'    => 49,
                'title' => 'test_result_delete',
            ],
            [
                'id'    => 50,
                'title' => 'test_result_access',
            ],
            [
                'id'    => 51,
                'title' => 'test_answer_create',
            ],
            [
                'id'    => 52,
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => 53,
                'title' => 'test_answer_show',
            ],
            [
                'id'    => 54,
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => 55,
                'title' => 'test_answer_access',
            ],
            [
                'id'    => 56,
                'title' => 'capacitacion_access',
            ],
            [
                'id'    => 57,
                'title' => 'client_management_access',
            ],
            [
                'id'    => 58,
                'title' => 'client_create',
            ],
            [
                'id'    => 59,
                'title' => 'client_edit',
            ],
            [
                'id'    => 60,
                'title' => 'client_show',
            ],
            [
                'id'    => 61,
                'title' => 'client_delete',
            ],
            [
                'id'    => 62,
                'title' => 'client_access',
            ],
            [
                'id'    => 63,
                'title' => 'brand_create',
            ],
            [
                'id'    => 64,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 65,
                'title' => 'brand_show',
            ],
            [
                'id'    => 66,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 67,
                'title' => 'brand_access',
            ],
            [
                'id'    => 68,
                'title' => 'project_create',
            ],
            [
                'id'    => 69,
                'title' => 'project_edit',
            ],
            [
                'id'    => 70,
                'title' => 'project_show',
            ],
            [
                'id'    => 71,
                'title' => 'project_delete',
            ],
            [
                'id'    => 72,
                'title' => 'project_access',
            ],
            [
                'id'    => 73,
                'title' => 'event_management_access',
            ],
            [
                'id'    => 74,
                'title' => 'route_create',
            ],
            [
                'id'    => 75,
                'title' => 'route_edit',
            ],
            [
                'id'    => 76,
                'title' => 'route_show',
            ],
            [
                'id'    => 77,
                'title' => 'route_delete',
            ],
            [
                'id'    => 78,
                'title' => 'route_access',
            ],
            [
                'id'    => 79,
                'title' => 'event_create',
            ],
            [
                'id'    => 80,
                'title' => 'event_edit',
            ],
            [
                'id'    => 81,
                'title' => 'event_show',
            ],
            [
                'id'    => 82,
                'title' => 'event_delete',
            ],
            [
                'id'    => 83,
                'title' => 'event_access',
            ],
            [
                'id'    => 84,
                'title' => 'group_create',
            ],
            [
                'id'    => 85,
                'title' => 'group_edit',
            ],
            [
                'id'    => 86,
                'title' => 'group_show',
            ],
            [
                'id'    => 87,
                'title' => 'group_delete',
            ],
            [
                'id'    => 88,
                'title' => 'group_access',
            ],
            [
                'id'    => 89,
                'title' => 'location_create',
            ],
            [
                'id'    => 90,
                'title' => 'location_edit',
            ],
            [
                'id'    => 91,
                'title' => 'location_show',
            ],
            [
                'id'    => 92,
                'title' => 'location_delete',
            ],
            [
                'id'    => 93,
                'title' => 'location_access',
            ],
            [
                'id'    => 94,
                'title' => 'check_access',
            ],
            [
                'id'    => 95,
                'title' => 'checkin_create',
            ],
            [
                'id'    => 96,
                'title' => 'checkin_edit',
            ],
            [
                'id'    => 97,
                'title' => 'checkin_show',
            ],
            [
                'id'    => 98,
                'title' => 'checkin_delete',
            ],
            [
                'id'    => 99,
                'title' => 'checkin_access',
            ],
            [
                'id'    => 100,
                'title' => 'checkout_create',
            ],
            [
                'id'    => 101,
                'title' => 'checkout_edit',
            ],
            [
                'id'    => 102,
                'title' => 'checkout_show',
            ],
            [
                'id'    => 103,
                'title' => 'checkout_delete',
            ],
            [
                'id'    => 104,
                'title' => 'checkout_access',
            ],
            [
                'id'    => 105,
                'title' => 'communication_access',
            ],
            [
                'id'    => 106,
                'title' => 'blog_create',
            ],
            [
                'id'    => 107,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 108,
                'title' => 'blog_show',
            ],
            [
                'id'    => 109,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 110,
                'title' => 'blog_access',
            ],
            [
                'id'    => 111,
                'title' => 'questionarie_create',
            ],
            [
                'id'    => 112,
                'title' => 'questionarie_edit',
            ],
            [
                'id'    => 113,
                'title' => 'questionarie_show',
            ],
            [
                'id'    => 114,
                'title' => 'questionarie_delete',
            ],
            [
                'id'    => 115,
                'title' => 'questionarie_access',
            ],
            [
                'id'    => 116,
                'title' => 'trivia_create',
            ],
            [
                'id'    => 117,
                'title' => 'trivia_edit',
            ],
            [
                'id'    => 118,
                'title' => 'trivia_show',
            ],
            [
                'id'    => 119,
                'title' => 'trivia_delete',
            ],
            [
                'id'    => 120,
                'title' => 'trivia_access',
            ],
            [
                'id'    => 121,
                'title' => 'answer_create',
            ],
            [
                'id'    => 122,
                'title' => 'answer_edit',
            ],
            [
                'id'    => 123,
                'title' => 'answer_show',
            ],
            [
                'id'    => 124,
                'title' => 'answer_delete',
            ],
            [
                'id'    => 125,
                'title' => 'answer_access',
            ],
            [
                'id'    => 126,
                'title' => 'witness_create',
            ],
            [
                'id'    => 127,
                'title' => 'witness_edit',
            ],
            [
                'id'    => 128,
                'title' => 'witness_show',
            ],
            [
                'id'    => 129,
                'title' => 'witness_delete',
            ],
            [
                'id'    => 130,
                'title' => 'witness_access',
            ],
            [
                'id'    => 131,
                'title' => 'witnesspost_create',
            ],
            [
                'id'    => 132,
                'title' => 'witnesspost_edit',
            ],
            [
                'id'    => 133,
                'title' => 'witnesspost_show',
            ],
            [
                'id'    => 134,
                'title' => 'witnesspost_delete',
            ],
            [
                'id'    => 135,
                'title' => 'witnesspost_access',
            ],
            [
                'id'    => 136,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
