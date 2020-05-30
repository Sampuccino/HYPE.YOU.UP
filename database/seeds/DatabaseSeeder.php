<?php

use App\Comment;
use App\Review;
use App\Reviewee;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @param Faker $faker
   * @return void
   */
    public function run(Faker $faker)
    {
        // $this->call(UserSeeder::class);
      /*
       * 1. Seed Reviewee | Random @ 10
       * 2. Seed Reviews | Random @ 5 ~ 10
       * 3. Seed Comments to those Reviews | Random @ 3 ~ 10
       * */

      for ($a = 0; $a <= 10; $a++) {
        // Create Reviewee
        $reviewee = Reviewee::create([
          'name' => $faker->name,
          'rating' => $faker->randomFloat(1,1,5),
          'image' => $faker->imageUrl(640, 480, 'transport'),
          'description' => $faker->paragraph,
        ]);

        $randomReviewsNumber = random_int(5,10);
        $randomCommentsNumber = random_int(3,10);
        for ($b = 0; $b < $randomReviewsNumber; $b++) {
          $types = ['Agreeable', 'Nueroticism', 'Extroversion', 'Openness', 'Conscientiousness'];
          $review = Review::create([
                            'reviewee_id' => $reviewee->id,
                            'pt_score' => random_int(1,5),
                            'personality' => $types[random_int(0,4)],
                            'q1' => random_int(1,5),
                            'q2' => random_int(1,5),
                            'q3' => random_int(1,5),
                            'q4' => random_int(1,5),
                            'q5' => random_int(1,5),
                            'q6' => random_int(1,5),
                            'q7' => random_int(1,5),
                            'q8' => random_int(1,5),
                            'q9' => random_int(1,5),
                            'q10' => random_int(1,5),
                            'pros' => $faker->paragraph,
                            'cons' => $faker->paragraph,
                            'snapchat_url' => 'www.snapchat.com',
                            'facebook_url' => 'www.facebook.com',
                            'instagram_url' => 'www.instagram.com',
                            'recommend' => random_int(0,1),
                          ]);

          for ($c = 0; $c < $randomCommentsNumber; $c++) {
            Comment::create([
              'review_id' => $review->id,
              'name' => $faker->firstName,
              'image' => $faker->imageUrl(440, 280, 'transport'),
              'body' => $faker->paragraph,
              'rating' => $faker->randomFloat(1,1,5)
            ]);
          }

        }
      }

    }
}
