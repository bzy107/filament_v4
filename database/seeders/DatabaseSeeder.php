<?php

namespace Database\Seeders;

use App\Models\Breed;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Owner;
use App\Models\Patient;
use App\Models\Rank;
use App\Models\Treatment;
use App\Models\Vaccine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                // UserSeeder::class,
                // PatientSeeder::class,
            ]
        );

        $roomNames = [
            '浅香山部屋',
            '朝日山部屋',
            '安治川部屋',
            '荒汐部屋',
            '雷部屋',
            '伊勢ヶ濱部屋',
            '伊勢ノ海部屋',
            '追手風部屋',
            '阿武松部屋',
            '大島部屋',
            '大嶽部屋',
            '押尾川部屋',
            '音羽山部屋',
            '尾上部屋',
            '春日野部屋',
            '片男波部屋',
            '木瀬部屋',
            '九重部屋',
            '境川部屋',
            '佐渡ヶ嶽部屋',
            '式秀部屋',
            '錣山部屋',
            '芝田山部屋',
            '高砂部屋',
            '高田川部屋',
            '武隈部屋',
            '田子ノ浦部屋',
            '立浪部屋',
            '玉ノ井部屋',
            '出羽海部屋',
            '時津風部屋',
            '常盤山部屋',
            '中村部屋',
            '鳴戸部屋',
            '西岩部屋',
            '錦戸部屋',
            '二所ノ関部屋',
            '八角部屋',
            '放駒部屋',
            '秀ノ山部屋',
            '藤島部屋',
            '二子山部屋',
            '湊部屋',
            '武蔵川部屋',
            '山響部屋',
        ];
        foreach ($roomNames as $roomName) {
            Vaccine::factory()->create(['room_name' => $roomName]);
        }
        $vaccines = Vaccine::all();
        $randNames = [
            '横綱',
            '大関',
            '関脇',
            '小結',
            '前頭筆頭',
            '前頭二枚目',
            '前頭三枚目',
            '前頭四枚目',
            '前頭五枚目',
            '前頭六枚目',
            '前頭七枚目',
            '前頭八枚目',
            '前頭九枚目',
            '前頭十枚目',
            '前頭十一枚目',
            '前頭十二枚目',
            '前頭十三枚目',
            '前頭十四枚目',
            '前頭十五枚目',
            '前頭十六枚目',
        ];
        foreach ($randNames as $randName) {
            Breed::factory()->create(
                ['rank_name' => $randName]
            );
        }

        $breeds = Breed::all();
        $owners = Owner::factory()
            ->count(20)
            ->sequence(
                [
                    'last_name' => '豊昇龍',
                    'first_name' => '智勝',
                    'last_name_kana' => 'ほうしょうりゅう',
                    'first_name_kana' => 'ともかつ',
                    'real_name' => 'スガラグチャー・ビャンバスレン',
                    'country' => 'モンゴル',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '大の里',
                    'first_name' => '泰輝',
                    'last_name_kana' => 'おおのさと',
                    'first_name_kana' => 'だいき',
                    'real_name' => '中村泰輝',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '琴櫻',
                    'first_name' => '将傑',
                    'last_name_kana' => 'ことざくら',
                    'first_name_kana' => 'まさかつ',
                    'real_name' => '鎌谷将且',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '大栄翔',
                    'first_name' => '勇人',
                    'last_name_kana' => 'だいえいしょう',
                    'first_name_kana' => 'はやと',
                    'real_name' => '高西勇人',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '霧島',
                    'first_name' => '鐵力',
                    'last_name_kana' => 'きりしま',
                    'first_name_kana' => 'てつお',
                    'real_name' => 'ビャンブチュルン・ハグワスレン',
                    'country' => 'モンゴル',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '若隆景',
                    'first_name' => '渥',
                    'last_name_kana' => 'わかたかかげ',
                    'first_name_kana' => 'あつし',
                    'real_name' => '大波渥',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '欧勝馬',
                    'first_name' => '出気',
                    'last_name_kana' => 'おうしょうま',
                    'first_name_kana' => 'でぎ',
                    'real_name' => 'プレブスレン・デルゲルバヤル',
                    'country' => 'モンゴル',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '高安',
                    'first_name' => '晃',
                    'last_name_kana' => 'たかやす',
                    'first_name_kana' => 'あきら',
                    'real_name' => '高安晃',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '安青錦',
                    'first_name' => '新大',
                    'last_name_kana' => 'あおにしき',
                    'first_name_kana' => 'あらた',
                    'real_name' => 'ヤブグシシン・ダニーロ',
                    'country' => 'ウクライナ',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '若元春',
                    'first_name' => '港',
                    'last_name_kana' => 'わかもとはる',
                    'first_name_kana' => 'みなと',
                    'real_name' => '大波港',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '王鵬',
                    'first_name' => '幸之介',
                    'last_name_kana' => 'おうほう',
                    'first_name_kana' => 'こうのすけ',
                    'real_name' => '納谷幸之介',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '阿炎',
                    'first_name' => '政虎',
                    'last_name_kana' => 'あび',
                    'first_name_kana' => 'まさとら',
                    'real_name' => '堀切洸助',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '阿武剋',
                    'first_name' => '一弘',
                    'last_name_kana' => 'おうのかつ',
                    'first_name_kana' => 'かずひろ',
                    'real_name' => 'バトジャルガル・チョイジルスレン',
                    'country' => 'モンゴル',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '金峰山',
                    'first_name' => '晴樹',
                    'last_name_kana' => 'きんぼうざん',
                    'first_name_kana' => 'はるき',
                    'real_name' => 'バルタグル・イェルシン',
                    'country' => 'カザフスタン',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '伯桜鵬',
                    'first_name' => '哲也',
                    'last_name_kana' => 'はくおうほう',
                    'first_name_kana' => 'てつや',
                    'real_name' => '落合哲也',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '玉鷲',
                    'first_name' => '一朗',
                    'last_name_kana' => 'たまわし',
                    'first_name_kana' => 'いちろう',
                    'real_name' => '玉鷲一朗',
                    'country' => 'モンゴル',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '平戸海',
                    'first_name' => '雄貴',
                    'last_name_kana' => 'ひらどうみ',
                    'first_name_kana' => 'ゆうき',
                    'real_name' => '坂口雄貴',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '明生',
                    'first_name' => '力',
                    'last_name_kana' => 'めいせい',
                    'first_name_kana' => 'ちから',
                    'real_name' => '川畑明生',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '尊富士',
                    'first_name' => '弥輝也',
                    'last_name_kana' => 'たけるふじ',
                    'first_name_kana' => 'みきや',
                    'real_name' => '石岡弥輝也',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
                [
                    'last_name' => '豪ノ山',
                    'first_name' => '登輝',
                    'last_name_kana' => 'ごうのやま',
                    'first_name_kana' => 'とうき',
                    'real_name' => '西川登輝',
                    'country' => '日本',
                    'is_retired' => 0,
                ],
            )
            ->create();

        for ($i = 0; $i < $owners->count(); $i++) {
            for ($j = 0; $j < 10; $j++) {
                Patient::factory()->create(
                    function () use ($owners, $i, $j) {
                        $owner = $owners->get($i);
                        if ($owner->last_name === '豊昇龍' || $owner->last_name === '明生') {
                            $vaccine_id = Vaccine::where('room_name', '立浪部屋')->value('id');
                            if ($owner->last_name === '豊昇龍') {
                                $breed_id = Breed::where('rank_name', '横綱')->value('id');
                            }
                            if ($owner->last_name === '明生') {
                                $breed_id = Breed::where('rank_name', '前頭五枚目')->value('id');
                            }
                        }
                        if ($owner->last_name === '大の里') {
                            $vaccine_id = Vaccine::where('room_name', '二所ノ関部屋')->value('id');
                            if ($owner->last_name === '大の里') {
                                $breed_id = Breed::where('rank_name', '横綱')->value('id');
                            }
                        }
                        if ($owner->last_name === '琴櫻') {
                            $vaccine_id = Vaccine::where('room_name', '佐渡ヶ嶽部屋')->value('id');
                            if ($owner->last_name === '琴櫻') {
                                $breed_id = Breed::where('rank_name', '大関')->value('id');
                            }
                        }
                        if ($owner->last_name === '大栄翔') {
                            $vaccine_id = Vaccine::where('room_name', '追手風部屋')->value('id');
                            if ($owner->last_name === '大栄翔') {
                                $breed_id = Breed::where('rank_name', '関脇')->value('id');
                            }
                        }
                        if ($owner->last_name === '霧島') {
                            $vaccine_id = Vaccine::where('room_name', '音羽山部屋')->value('id');
                            if ($owner->last_name === '霧島') {
                                $breed_id = Breed::where('rank_name', '関脇')->value('id');
                            }
                        }
                        if ($owner->last_name === '若隆景' || $owner->last_name === '若元春') {
                            $vaccine_id = Vaccine::where('room_name', '荒汐部屋')->value('id');
                            if ($owner->last_name === '若隆景') {
                                $breed_id = Breed::where('rank_name', '関脇')->value('id');
                            }
                            if ($owner->last_name === '若元春') {
                                $breed_id = Breed::where('rank_name', '前頭筆頭')->value('id');
                            }
                        }
                        if ($owner->last_name === '欧勝馬') {
                            $vaccine_id = Vaccine::where('room_name', '鳴戸部屋')->value('id');
                            if ($owner->last_name === '欧勝馬') {
                                $breed_id = Breed::where('rank_name', '小結')->value('id');
                            }
                        }
                        if ($owner->last_name === '高安') {
                            $vaccine_id = Vaccine::where('room_name', '田子ノ浦部屋')->value('id');
                            if ($owner->last_name === '高安') {
                                $breed_id = Breed::where('rank_name', '小結')->value('id');
                            }
                        }
                        if ($owner->last_name === '安青錦') {
                            $vaccine_id = Vaccine::where('room_name', '安治川部屋')->value('id');
                            if ($owner->last_name === '安青錦') {
                                $breed_id = Breed::where('rank_name', '前頭筆頭')->value('id');
                            }
                        }
                        if ($owner->last_name === '王鵬') {
                            $vaccine_id = Vaccine::where('room_name', '大嶽部屋')->value('id');
                            if ($owner->last_name === '王鵬') {
                                $breed_id = Breed::where('rank_name', '前頭二枚目')->value('id');
                            }
                        }
                        if ($owner->last_name === '阿炎') {
                            $vaccine_id = Vaccine::where('room_name', '錣山部屋')->value('id');
                            if ($owner->last_name === '阿炎') {
                                $breed_id = Breed::where('rank_name', '前頭二枚目')->value('id');
                            }
                        }
                        if ($owner->last_name === '阿武剋') {
                            $vaccine_id = Vaccine::where('room_name', '阿武松部屋')->value('id');
                            if ($owner->last_name === '阿武剋') {
                                $breed_id = Breed::where('rank_name', '前頭三枚目')->value('id');
                            }
                        }
                        if ($owner->last_name === '金峰山') {
                            $vaccine_id = Vaccine::where('room_name', '木瀬部屋')->value('id');
                            if ($owner->last_name === '金峰山') {
                                $breed_id = Breed::where('rank_name', '前頭三枚目')->value('id');
                            }
                        }
                        if ($owner->last_name === '伯桜鵬' || $owner->last_name === '尊富士') {
                            $vaccine_id = Vaccine::where('room_name', '伊勢ヶ濱部屋')->value('id');
                            if ($owner->last_name === '伯桜鵬') {
                                $breed_id = Breed::where('rank_name', '前頭四枚目')->value('id');
                            }
                            if ($owner->last_name === '尊富士') {
                                $breed_id = Breed::where('rank_name', '前頭六枚目')->value('id');
                            }
                        }
                        if ($owner->last_name === '玉鷲') {
                            $vaccine_id = Vaccine::where('room_name', '片男波部屋')->value('id');
                            if ($owner->last_name === '玉鷲') {
                                $breed_id = Breed::where('rank_name', '前頭四枚目')->value('id');
                            }
                        }
                        if ($owner->last_name === '平戸海') {
                            $vaccine_id = Vaccine::where('room_name', '境川部屋')->value('id');
                            if ($owner->last_name === '平戸海') {
                                $breed_id = Breed::where('rank_name', '前頭五枚目')->value('id');
                            }
                        }
                        if ($owner->last_name === '豪ノ山') {
                            $vaccine_id = Vaccine::where('room_name', '武隈部屋')->value('id');
                            if ($owner->last_name === '豪ノ山') {
                                $breed_id = Breed::where('rank_name', '前頭六枚目')->value('id');
                            }
                        }

                        return [
                            'owner_id' => $owners->get($i)->id,
                            'breed_id' => $breed_id,
                            'vaccine_id' => $vaccine_id,
                            'information_date' => Carbon::now()->subDays($j)->toDateString(),
                        ];
                    }
                );
            }
        }

        // for ($i = 0; $i < 30; $i++) {
        //     Vaccine::factory()->create(['vaccine_name' => $i + 1]);
        //     Owner::factory()->create(
        //         [
        //             'owner_name' => $i + 1,
        //             'email' => $i + 1 . '@test.com',
        //             'phone' => str_pad($i + 1, 11, '0', STR_PAD_LEFT),
        //         ]
        //     );
        // }

        // $vaccines = Vaccine::all();
        // $owners = Owner::all();

        // for ($j = 0; $j < $vaccines->count(); $j++) {
        //     Breed::factory()->create(
        //         [
        //             'breed_name' => $j + 1,
        //         ]
        //     );
        // }

        // $breeds = Breed::all();

        // for ($l = 0; $l < $vaccines->count(); $l++) {
        //     for ($n = 0; $n < 10; $n++) {
        //         Patient::factory()->create(
        //             [
        //                 'patient_name' => $l + 1,
        //                 'owner_id' => $owners->get($l)->id,
        //                 'breed_id' => $breeds->get($l)->id,
        //                 'vaccine_id' => $vaccines->get($l)->id,
        //                 'type' => $breeds->get($l)->species,
        //                 'registered_at' => Carbon::now()->subDays($n)->toDateString(),
        //             ]
        //         );
        //     }
        // }


    }
}
