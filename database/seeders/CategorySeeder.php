<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'slug' => 'Bangladesh',
                'name' => 'বাংলাদেশ',
                'children' => [
                    [
                        'slug' => 'National',
                        'name' => 'জাতীয়',
                    ],
                    [
                        'slug' => 'Politics',
                        'name' => 'রাজনীতি',
                    ],
                    [
                        'slug' => 'Economics',
                        'name' => 'অর্থনীতি',
                    ],
                    [
                        'slug' => 'District News',
                        'name' => 'জেলার সংবাদ',
                    ],
                    [
                        'slug' => 'Crime',
                        'name' => 'অপরাধ',
                    ],
                    [
                        'slug' => 'Capital',
                        'name' => 'রাজধানী',
                    ],
                    [
                        'slug' => 'Megha City',
                        'name' => 'মহানগরী',
                    ],
                ],
            ],

            [
                'slug' => 'International',
                'name' => 'আন্তর্জাতিক',
                'children' => [
                    [
                        'slug' => 'America',
                        'name' => 'আমেরিকা',
                    ],
                    [
                        'slug' => 'India',
                        'name' => 'ভারত',
                    ],
                    [
                        'slug' => 'Asia',
                        'name' => 'এশিয়া',
                    ],
                    [
                        'slug' => 'Europe',
                        'name' => 'ইউরোপ',
                    ],
                    [
                        'slug' => 'Arab',
                        'name' => 'আরব',
                    ],
                    [
                        'slug' => 'Others International',
                        'name' => 'অন্যান্য',
                    ],
                ],
            ],
            [
                'slug' => 'Sports',
                'name' => 'খেলাধুলা',
                'children' => [
                    [
                        'slug' => 'Cricket',
                        'name' => 'ক্রিকেট',
                    ],
                    [
                        'slug' => 'Football',
                        'name' => 'ফুটবল',
                    ],
                    [
                        'slug' => 'Others Sports',
                        'name' => 'অন্যান্য খেলা',
                    ],
                ],
            ],
            [
                'slug' => 'Recreation',
                'name' => 'বিনোদন',
                'children' => [
                    [
                        'slug' => 'Culture',
                        'name' => 'সংস্কৃতি',
                    ],
                    [
                        'slug' => 'Dhallywood',
                        'name' => 'ঢালিউড',
                    ],
                    [
                        'slug' => 'Hollywood',
                        'name' => 'হলিউড',
                    ],
                    [
                        'slug' => 'Bollywood',
                        'name' => 'বলিউড',
                    ],
                    [
                        'slug' => 'Television',
                        'name' => 'টেলিভিশন',
                    ],
                    [
                        'slug' => 'Others Entertainment',
                        'name' => 'অন্যান্য',
                    ],
                ],
            ],
            [
                'slug' => 'Opinion',
                'name' => 'মতামত',
                'children' => [
                    [
                        'slug' => 'Interview',
                        'name' => 'সাক্ষাৎকার',
                    ],
                    [
                        'slug' => 'Editorial Opinion',
                        'name' => 'সম্পাদকীয়',
                    ],
                    [
                        'slug' => 'Controversy',
                        'name' => 'বিতর্ক',
                    ],
                    [
                        'slug' => 'Society',
                        'name' => 'সমাজ',
                    ],
                ],
            ],
            [
                'slug' => 'Religion',
                'name' => 'ধর্ম',
                'children' => [
                    [
                        'slug' => 'Islam Religion',
                        'name' => 'ইসলাম',
                    ],
                    [
                        'slug' => 'Others Religions',
                        'name' => 'অন্যান্য ধর্ম',
                    ],
                ],
            ],
            [
                'slug' => 'Literature',
                'name' => 'সাহিত্য',
                'children' => [
                    [
                        'slug' => 'Poem Literature',
                        'name' => 'কবিতা',
                    ],
                    [
                        'slug' => 'Story Literature',
                        'name' => 'গল্প',
                    ],
                    [
                        'slug' => 'Travel Literature',
                        'name' => 'ভ্রমণ',
                    ],
                    [
                        'slug' => 'Books Literature',
                        'name' => 'বইপত্র',
                    ],
                    [
                        'slug' => 'Translation Literature',
                        'name' => 'অনুবাদ',
                    ],
                    [
                        'slug' => 'Others Literature',
                        'name' => 'অন্যান্য',
                    ],
                ],
            ],
            [
                'slug' => 'Job',
                'name' => 'চাকরি',
                'children' => [
                    [
                        'slug' => 'Career',
                        'name' => 'ক্যারিয়ার',
                    ],
                    [
                        'slug' => 'Anouncement Job',
                        'name' => 'বিজ্ঞাপন',
                    ],
                    [
                        'slug' => 'Counsel Job',
                        'name' => 'পরামর্শ',
                    ],
                ],
            ],
            [
                'slug' => 'Video',
                'name' => 'ভিডিও',
                'children' => [
                    [
                        'slug' => 'Special Report',
                        'name' => 'বিশেষ প্রতিবেদন',
                    ],
                    [
                        'slug' => 'News Video',
                        'name' => 'সংবাদের ভিডিও',
                    ],
                    [
                        'slug' => 'Program',
                        'name' => 'অনুষ্ঠান',
                    ],
                ],
            ],
            [
                'slug' => 'English News',
                'name' => 'English News',
                'children' => [
                    [
                        'slug' => 'English Economics',
                        'name' => 'Economics',
                    ],
                    [
                        'slug' => 'English Politics',
                        'name' => 'Politics',
                    ],
                    [
                        'slug' => 'English International',
                        'name' => 'International',
                    ],
                    [
                        'slug' => 'English Sports',
                        'name' => 'Sports',
                    ],
                    [
                        'slug' => 'English National',
                        'name' => 'National',
                    ],
                ],
            ],
            [
                'slug' => 'Miscellaneous',
                'name' => 'বিবিধ',
                'children' => [
                    [
                        'slug' => 'Science Tech',
                        'name' => 'বিজ্ঞান ও প্রযুক্তি',
                    ],
                    [
                        'slug' => 'Emigration',
                        'name' => 'প্রবাস',
                    ],
                    [
                        'slug' => 'Education',
                        'name' => 'শিক্ষা',
                    ],
                    [
                        'slug' => 'Health',
                        'name' => 'স্বাস্থ্য',
                    ],
                    [
                        'slug' => 'Lifestyle',
                        'name' => 'লাইফস্টাইল',
                    ],
                    [
                        'slug' => 'Women',
                        'name' => 'নারী',
                    ],
                    [
                        'slug' => 'Agriculture',
                        'name' => 'কৃষি',
                    ],
                    [
                        'slug' => 'Law Rules',
                        'name' => 'আইন ও কানুন',
                    ],
                    [
                        'slug' => 'Kids Zone',
                        'name' => 'কিডজ জোন',
                    ],
                    [
                        'slug' => 'Book Fair',
                        'name' => 'অমর একুশে গ্রন্থমেলা',
                    ],
                    [
                        'slug' => 'Repoters Diary',
                        'name' => 'রিপোর্টার্স ডায়েরি',
                    ],
                    [
                        'slug' => 'Cricket World Cup 2019',
                        'name' => 'বিশ্বকাপ ক্রিকেট ২০১৯',
                    ],
                    [
                        'slug' => 'Eid Special',
                        'name' => 'ঈদ স্পেশাল',
                    ],
                    [
                        'slug' => 'Dengue',
                        'name' => 'ডেঙ্গু',
                    ],
                    [
                        'slug' => 'Dengue Helpdesk',
                        'name' => 'ডেঙ্গু হেল্পডেস্ক',
                    ],
                    [
                        'slug' => 'Dengue Headline',
                        'name' => 'ডেঙ্গু শিরোনাম',
                    ],
                ],
            ],
            [
                'slug' => 'Travel',
                'name' => 'ভ্রমণ',
                'children' => [
                    [
                        'slug' => 'Where To Travel',
                        'name' => 'কোথায় বেড়াবো',
                    ],

                ],
            ],
            [
                'slug' => 'Youth',
                'name' => 'তারুণ্য',
                'children' => [],
            ],
        ];

        // Category::create($categories);
        // foreach ($categories as $category) {
        //     Category::create([
        //         'slug' => $category['slug'],
        //         'name' => $category['name']
        //     ]);
        // }

        foreach ($categories  as $category) {
            $parent = Category::create([
                'slug' => Str::slug($category['slug']),
                'name' => $category['name'],
            ]);

            if (isset($category['children']) && count($category['children']) > 0) {
                foreach ($category['children'] as $child) {
                    $parent->children()->create([
                        'slug' => Str::slug($child['slug']),
                        'name' => $child['name'],
                    ]);
                }
            }
        }
    }
}
