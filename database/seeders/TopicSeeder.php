<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
            [
                'slug' => 'Chatro Dol',
                'name' => 'ছাত্রদল',

            ],
            [
                'slug' => 'Music',
                'name' => 'মিউজিক',
            ],
            [
                'slug' => 'Daily Magazine',
                'name' => 'ডেইলি ম্যাগাজিন',

            ],
            [
                'slug' => 'Cinema Hall',
                'name' => 'সিনেমা হল',
            ],
            [
                'slug' => 'Bangla Cinema',
                'name' => 'বাংলা সিনেমা',

            ],
            [
                'slug' => 'Budget 2020 2021',
                'name' => 'বাজেট ২০২০-২০২১',
            ],
            [
                'slug' => 'Corona Virus',
                'name' => 'করোনা ভাইরাস',

            ],
            [
                'slug' => '100th Birth Year of Bangabandhu',
                'name' => 'মুজিববর্ষ',
            ],
            [
                'slug' => 'Iran America',
                'name' => 'ইরান-আমেরিকা',

            ],
            [
                'slug' => 'Bush Fire',
                'name' => 'দাবানল',
            ],
            [
                'slug' => 'Jatiya Party',
                'name' => 'জাতীয় পার্টি',

            ],
            [
                'slug' => 'Torture',
                'name' => 'অত্যাচার',
            ],
            [
                'slug' => 'Collision',
                'name' => 'সংঘর্ষ',

            ],
            [
                'slug' => 'Bangabandhu BPL	',
                'name' => 'বঙ্গবন্ধু বিপিএল',
            ],
            [
                'slug' => 'Occupancy',
                'name' => 'দখল',

            ],
            [
                'slug' => 'Nature',
                'name' => 'পরিবেশ',
            ],
            [
                'slug' => 'Hunger Strike',
                'name' => 'অনশন',

            ],
            [
                'slug' => '	Sexually Assault',
                'name' => 'যৌন হয়রানি',
            ],
            [
                'slug' => 'Demonstration',
                'name' => 'বিক্ষোভ',
            ],
            [
                'slug' => 'Border',
                'name' => 'সীমান্ত',
            ],
            [
                'slug' => 'Suicide',
                'name' => 'আত্মহত্যা',
            ],
            [
                'slug' => 'Strike',
                'name' => 'ধর্মঘট',
            ],
            [
                'slug' => 'Air Polution',
                'name' => 'বায়ু দূষণ',
            ],
            [
                'slug' => 'Drugs',
                'name' => 'মাদক',
            ],
            [
                'slug' => 'Transport strike',
                'name' => 'পরিবহন ধর্মঘট',
            ],
            [
                'slug' => '	Border Killing',
                'name' => 'সীমান্তে হত্যা',
            ],
            [
                'slug' => 'Road Law',
                'name' => 'নতুন সড়ক পরিবহন আইন',

            ],
            [
                'slug' => 'Natural Disaster',
                'name' => 'প্রাকৃতিক দুর্যোগ',
            ],
            [
                'slug' => 'Rumors',
                'name' => 'গুজব',

            ],
            [
                'slug' => 'Metrorail',
                'name' => 'মেট্রোরেল',
            ],
            [
                'slug' => 'Festival',
                'name' => 'উৎসব',

            ],
            [
                'slug' => 'Riverbank Erosion',
                'name' => 'নদী ভাঙ্গন',
            ],
            [
                'slug' => '	Bangladesh Cricket',
                'name' => 'বাংলাদেশ ক্রিকেট',

            ],
            [
                'slug' => 'Strange News',
                'name' => 'আজব খবর',
            ],
            [
                'slug' => '	Traffic Jam',
                'name' => 'যানজট',

            ],
            [
                'slug' => 'Boat Sink',
                'name' => 'নৌকাডুবি',
            ],
            [
                'slug' => 'Launch Sink',
                'name' => 'লঞ্চডুবি',

            ],
            [
                'slug' => 'Private University',
                'name' => 'প্রাইভেট বিশ্ববিদ্যালয়',
            ],
            [
                'slug' => '	Jahangirnagar University',
                'name' => 'জাহাঙ্গীরনগর বিশ্ববিদ্যালয়',

            ],
            [
                'slug' => 'Accident',
                'name' => 'দুর্ঘটনা',
            ],
            [
                'slug' => 'Death by Drowning',
                'name' => 'পানিতে ডুবে মৃত্যু',

            ],
            [
                'slug' => 'Mirza Fakhrul Islam Alamgir',
                'name' => 'মীর্জা ফখরুল ইসলাম আলমগীর',
            ],
            [
                'slug' => '	Obaidul Kader',
                'name' => 'ওবায়দুল কাদের',

            ],
            [
                'slug' => 'Fire Incident',
                'name' => 'অগ্নিকাণ্ড',
            ],
            [
                'slug' => 'Beating killing',
                'name' => 'পিটিয়ে হত্যা',

            ],
            [
                'slug' => 'BNP',
                'name' => 'বিএনপি',
            ],
            [
                'slug' => 'Awami League',
                'name' => 'আওয়ামী লীগ',

            ],
            [
                'slug' => '	Padma Bridge',
                'name' => 'পদ্মা সেতু',
            ],
            [
                'slug' => 'Gas Cylinder',
                'name' => 'গ্যাস সিলিন্ডার',

            ],
            [
                'slug' => 'Lynch',
                'name' => 'গণপিটুনি',
            ],
            [
                'slug' => 'Shakib Al Hasan',
                'name' => 'সাকিব আল হাসান',

            ],
            [
                'slug' => 'Corruption',
                'name' => 'দুর্নীতি',
            ],
            [
                'slug' => 'Suffering',
                'name' => 'দুর্ভোগ',

            ],
            [
                'slug' => '	Gun Fight',
                'name' => 'বন্দুকযুদ্ধ',
            ],
            [
                'slug' => '	Hilsha',
                'name' => 'ইলিশ',
            ],
            [
                'slug' => '	Dhaka University',
                'name' => 'ঢাকা বিশ্ববিদ্যালয়',
            ],
            [
                'slug' => 'Council',
                'name' => 'কাউন্সিল',
            ],
            [
                'slug' => '	BUET',
                'name' => 'বুয়েট',
            ],
            [
                'slug' => 'Khaleda Zia',
                'name' => 'খালেদা জিয়া',
            ],
            [
                'slug' => 'Flood',
                'name' => 'বন্যা',
            ],
            [
                'slug' => '	Onion price',
                'name' => 'পেঁয়াজের মূল্য',
            ],
            [
                'slug' => 'বশেমুরবিপ্রবি',
                'name' => 'বশেমুরবিপ্রবি',
            ],
            [
                'slug' => 'Chhatra League',
                'name' => 'ছাত্রলীগ',

            ],
            [
                'slug' => 'Facebook',
                'name' => 'ফেসবুক',
            ],
            [
                'slug' => 'Dengue',
                'name' => 'ডেঙ্গু',
            ],
            [
                'slug' => '	Child Rape',
                'name' => 'শিশু ধর্ষণ',

            ],
            [
                'slug' => 'War Criminal',
                'name' => 'যুদ্ধাপরাধী',
            ],
            [
                'slug' => '	Murder',
                'name' => 'হত্যা',

            ],
            [
                'slug' => 'River Occupy',
                'name' => 'নদী দখল',
            ],
            [
                'slug' => 'Airplane Accident',
                'name' => 'বিমান দুর্ঘটনা',

            ],
            [
                'slug' => '	Rail Accident',
                'name' => 'রেল দুর্ঘটনা',
            ],
            [
                'slug' => '	Road Accident',
                'name' => 'সড়ক দুর্ঘটনা',
            ],
            [
                'slug' => '	Environment Pollution',
                'name' => 'পরিবেশ দূষণ',
            ],
            [
                'slug' => '	River Pollution',
                'name' => 'নদী দূষণ',
            ],
            [
                'slug' => 'Rohinga',
                'name' => 'রোহিঙ্গা',
            ],
            [
                'slug' => 'Juba League',
                'name' => 'যুবলীগ',
            ],
            [
                'slug' => 'Rape',
                'name' => 'ধর্ষণ',
            ],
            [
                'slug' => 'Sheikh Hasina',
                'name' => 'শেখ হাসিনা',
            ],
        ];

        foreach ($topics  as $topic) {
            Topic::create([
                'slug' => Str::slug($topic['slug']),
                'name' => $topic['name'],
            ]);
        }
    }
}
