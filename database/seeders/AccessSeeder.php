<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('accesses')->insert([
            [
                'section' => 'Добавление материала',
            ],
            [
                'section' => 'Редактирование материала',
            ],
            [
                'section' => 'Список материалов',
            ],
            [
                'section' => 'Добавление пункта меню',
            ],
            [
                'section' => 'Редактировать пункт меню',
            ],
            [
                'section' => 'Список пунктов меню',
            ],
            [
                'section' => 'Добавление заявки',
            ],
            [
                'section' => 'Заявки',
            ],
            [
                'section' => 'Редактирование заявки',
            ],
            [
                'section' => 'Добавление отзыва',
            ],
            [
                'section' => 'Редактирование отзыва',
            ],
            [
                'section' => 'Список всех отзывов',
            ],
            [
                'section' => 'Слайдер',
            ],
            [
                'section' => 'Добавление нового пользователя',
            ],
            [
                'section' => 'Редактирование данных пользователя',
            ],
            [
                'section' => 'Список всех пользователей',
            ],
            [
                'section' => 'Добавление группы пользователей',
            ],
            [
                'section' => 'Редактирование группы пользователей',
            ],
            [
                'section' => 'Список групп пользователей',
            ],
        ]);
    }
}
