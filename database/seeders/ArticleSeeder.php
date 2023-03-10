<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $pinnedNews = Collection::times(15, function ($number) {
            return [
                'uuid' => Str::uuid(),
                'title' => "পার্বত্য চট্টগ্রামে পরিত্যক্ত সেনাক্যাম্পে পুলিশ থাকবে: স্বরাষ্ট্রমন্ত্রী ${number}",
                'slug' => "পার্বত্য-চট্টগ্রামে-পরিত্যক্ত-সেনাক্যাম্পে-পুলিশ-থাকবে:-স্বরাষ্ট্রমন্ত্রী-${number}",
                'teaser' => 'পার্বত্য এলাকার মানুষের নিরাপত্তার জন্য চট্টগ্রামে সেনাবাহিনীর পরিত্যক্ত সব ক্যাম্পে পুলিশ মোতায়েন করা হবে। জানিয়েছেন স্বরাষ্ট্রমন্ত্রী আসাদুজ্জামান খাঁন কামাল।',
                'kicker' => 'পার্বত্য চট্টগ্রামে',
                'content' => 'স্বরাষ্ট্রমন্ত্রী বলেন, পার্বত্য চট্টগ্রামে মাঝেমধ্যেই রক্তপাত হয়। তা বন্ধ করতে পার্বত্য জেলাগুলোতে শিগগিরই কার্যকর ব্যবস্থা নেয়া হবে। খুব শিগগিরই পার্বত্য জেলাগুলোর পুলিশকে আরও শক্তিশালী করা হবে। এর পাশাপাশি পরিত্যক্ত সেনা ক্যাম্পগুলো ব্যবহার করে পার্বত্য এলাকায় পুলিশী নিরাপত্তা আরও জোরদার করা হবে। যাতে পার্বত্য অঞ্চলের মানুষ নিরাপদে ব্যবসা-বাণিজ্য করতে পারে, স্বাভাবিক চলাচল করতে পারে।',
                'created_at' => now(),
                'status' => 'published',
                'updated_at' => now(),
                'user_id' => User::all()->random()->id,
            ];
        });

        Article::insert($pinnedNews->toArray());

        $nonPinned = Collection::times(20, function ($number) {
            return [
                'uuid' => Str::uuid(),
                'title' => "রাষ্ট্রপতির সংলাপে আমন্ত্রণ পেয়েছে বিএনপি ${number}",
                'slug' => "রাষ্ট্রপতির-সংলাপে-আমন্ত্রণ-পেয়েছে-বিএনপি-${number}",
                'teaser' => 'পার্বত্য এলাকার মানুষের নিরাপত্তার জন্য চট্টগ্রামে সেনাবাহিনীর পরিত্যক্ত সব ক্যাম্পে পুলিশ মোতায়েন করা হবে। জানিয়েছেন স্বরাষ্ট্রমন্ত্রী আসাদুজ্জামান খাঁন কামাল।',
                'kicker' => 'পার্বত্য চট্টগ্রামে',
                'content' => 'স্বরাষ্ট্রমন্ত্রী বলেন, পার্বত্য চট্টগ্রামে মাঝেমধ্যেই রক্তপাত হয়। তা বন্ধ করতে পার্বত্য জেলাগুলোতে শিগগিরই কার্যকর ব্যবস্থা নেয়া হবে। খুব শিগগিরই পার্বত্য জেলাগুলোর পুলিশকে আরও শক্তিশালী করা হবে। এর পাশাপাশি পরিত্যক্ত সেনা ক্যাম্পগুলো ব্যবহার করে পার্বত্য এলাকায় পুলিশী নিরাপত্তা আরও জোরদার করা হবে। যাতে পার্বত্য অঞ্চলের মানুষ নিরাপদে ব্যবসা-বাণিজ্য করতে পারে, স্বাভাবিক চলাচল করতে পারে।',
                'created_at' => now(),
                'status' => 'published',
                'updated_at' => now(),
                'user_id' => User::all()->random()->id,
            ];
        });

        Article::insert($nonPinned->toArray());

        for ($i = 18; $i < 27; $i++) {
            $bdCatArticle = [
                'uuid' => Str::uuid(),
                'title' => "নির্বাচনে হতাহতের দায় নিতে হবে প্রার্থীকে: ইসি ${i}",
                'teaser' => 'নির্বাচনে হতাহতের দায় কমিশন নেবে না। দায় নিতে হবে প্রার্থীদের। একথা বলেছেন নির্বাচন কমিশন সচিব হুমায়ূন কবির খন্দকার।',
                'slug' => "নির্বাচনে-হতাহতের-দায়-নিতে-হবে-প্রার্থীকে-ইসি-${i}",
                'kicker' => 'নির্বাচনে',
                'content' => 'তিনি বলেন, বিচ্ছিন্ন কয়েকটি ঘটনা ছাড়া উৎসবমুখর পরিবেশে ভোট হয়েছে। নয়টি কেন্দ্রে ভোট স্থগিত হয়েছে, নির্বাচনী সহিংসতায় ছয়জন নিহত হয়েছে। এই মৃত্যু দুঃখজনক। এভাবে মৃত্যু কাম্য  নয়। এর দায়-দায়িত্ব নিজ নিজ এলাকার প্রার্থীদের নিতে হবে।  ',
                'created_at' => now(),
                'status' => 'published',
                'updated_at' => now(),
                'user_id' => User::all()->random()->id,
            ];
            $article = Article::create($bdCatArticle);
            $article->categories()->sync(Category::where('slug', 'bangladesh')->first());
        }

        for ($i = 30; $i < 42; $i++) {
            $intCatArticle = [
                'uuid' => Str::uuid(),
                'title' => "ক্যাপিটল হিলে হামলার ঘটনায় ট্রাম্পকে এককভাবে দায়ী করবেন বাইডেন ${i}",
                'slug' => "ক্যাপিটল-হিলে-হামলার-ঘটনায়-ট্রাম্পকে-এককভাবে-দায়ী-করবেন-বাইডেন-${i}",
                'teaser' => "ক্যাপিটল হিলে হামলার ঘটনায় সাবেক মার্কিন প্রেসিডেন্ট ডোনাল্ড ট্রাম্পকে দায়ী করতে পারেন প্রেসিডেন্ট জো বাইডেন। ${i}",
                'kicker' => 'ট্রাম্পকে',
                'content' => "হোয়াইট হাউজের প্রেস সেক্রেটারি জেন সাকি জানান, হামলার জন্য এককভাবেই দায়ী করা হবে ট্রাম্পকে। এক বছর আগের ওই হামলায় জড়িত সন্দেহে এখন পর্যন্ত ৭শ'র বেশি ট্রাম্প সমর্থককে আটক করা হয়েছে।",
                'created_at' => now(),
                'status' => 'published',
                'updated_at' => now(),
                'user_id' => User::all()->random()->id,
            ];
            $article = Article::create($intCatArticle);
            $article->categories()->sync(Category::where('slug', 'international')->first());
        }

        for ($i = 40; $i < 55; $i++) {
            $sportsArticle = [
                'uuid' => Str::uuid(),
                'title' => "বছরের প্রথম এল ক্ল্যাসিকোতে জয় রিয়ালের ${i}",
                'slug' => "বছরের-প্রথম-এল-ক্ল্যাসিকোতে-জয়-রিয়ালের-${i}",
                'teaser' => 'বছরের প্রথম এল ক্ল্যাসিকোতে জয় পেয়েছে রিয়াল মাদ্রিদ। স্প্যানিশ সুপার কাপের সেমিফাইনালে বার্সেলোনাকে ২-৩ গোলে হারিয়ে ফাইনালে উঠলো রিয়াল।',
                'content' => 'সৌদি আরবের রিয়াদে নির্ধারিত সময়ের খেলা ২-২ গোলে অমিমাংসিত ভাবে শেষ হলে, অতিরিক্তি সময়ে ভালভার্দের গোলে শেষ হাসি হাসে গ্যালাক্টিকোরা।

                স্প্যানিশ সুপার কোপায় এল ক্ল্যাসিকো, ব্যাটল ফিল্ড সৌদি আরবের রিয়াদ, রিয়াল ভার্সেস বার্সা। ডাগ আউট বসদের ট্যাকটিক্স কাকতলীয় ভাবেই মিলে গেছে ৪-৩-৩ ফরমেশনে।',
                'created_at' => now(),
                'status' => 'published',
                'updated_at' => now(),
                'user_id' => User::all()->random()->id,
            ];
            $article = Article::create($sportsArticle);
            $article->categories()->sync(Category::where('slug', 'sports')->first());
        }

        for ($i = 55; $i < 66; $i++) {
            $recreationArticle = [
                'uuid' => Str::uuid(),
                'title' => "বছরের প্রথম এল ক্ল্যাসিকোতে জয় রিয়ালের ${i}",
                'slug' => "বছরের-প্রথম-এল-ক্ল্যাসিকোতে-জয়-রিয়ালের-${i}",
                'teaser' => 'বছরের প্রথম এল ক্ল্যাসিকোতে জয় পেয়েছে রিয়াল মাদ্রিদ। স্প্যানিশ সুপার কাপের সেমিফাইনালে বার্সেলোনাকে ২-৩ গোলে হারিয়ে ফাইনালে উঠলো রিয়াল।',
                'content' => 'সৌদি আরবের রিয়াদে নির্ধারিত সময়ের খেলা ২-২ গোলে অমিমাংসিত ভাবে শেষ হলে, অতিরিক্তি সময়ে ভালভার্দের গোলে শেষ হাসি হাসে গ্যালাক্টিকোরা।

                স্প্যানিশ সুপার কোপায় এল ক্ল্যাসিকো, ব্যাটল ফিল্ড সৌদি আরবের রিয়াদ, রিয়াল ভার্সেস বার্সা। ডাগ আউট বসদের ট্যাকটিক্স কাকতলীয় ভাবেই মিলে গেছে ৪-৩-৩ ফরমেশনে।',
                'created_at' => now(),
                'status' => 'published',
                'updated_at' => now(),
                'user_id' => User::all()->random()->id,
            ];
            $article = Article::create($recreationArticle);
            $article->categories()->sync(Category::where('slug', 'recreation')->first());
        }
    }
}
