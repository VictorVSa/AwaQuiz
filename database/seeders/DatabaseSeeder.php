<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Quiz;
use App\Enums\QuestionType;
use App\Models\Category;
use App\Models\Question;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
                // Seeding clients
                DB::table('clients')->insert([
                        'name' => 'De Volksbank',
                        'created_at' => Carbon::now()
                ]);

                // Seeding Quizzes
                DB::table('quizzes')->insert([
                        'name' => 'Phishing Quiz',
                        'client_id' => Client::first()->id,
                        'created_at' => Carbon::now()
                ]);

                // Seeding Categories
                DB::table('categories')->insert([
                        'name' => 'Phishing',
                        'created_at' => Carbon::now()
                ]);

                // Seeding Questions
                DB::table('questions')->insert([
                        'category_id' => Category::first()->id,
                        'type' => QuestionType::Multiple->value,
                        'text' => 'What are two of the things you should look for when receiving a link?',
                        'options' => json_encode(['Domain corresponds exactly with the original', 'It uses HTTPS protocol', 'The word \'cat\' is in the link']),
                        'correct_answers' => json_encode((object) [true, true, false]),
                        'created_at' => Carbon::now()
                ]);

                // Linking Question to Quiz
                Question::first()->quizzes()->attach(Quiz::first());

                // Seeding Tags
                DB::table('tags')->insert([
                        'name' => 'Q1',
                        'created_at' => Carbon::now()
                ]);
                Tag::first()->questions()->attach(Question::first());
        }
}
