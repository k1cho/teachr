<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Adnan Hadzipasic',
            'email' => 'k1cho@live.com',
            'password' => bcrypt('password'),
            'isAdmin' => 1,
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'avatar.png',
            'about' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',
        ]);

        App\Category::create(['name' => 'Laravel']);
        App\Category::create(['name' => 'Javascript']);
        App\Category::create(['name' => 'Web Design']);
        App\Category::create(['name' => 'Dev Ops']);

        App\Tag::create(['tag' => 'Web Development']);
        App\Tag::create(['tag' => 'Mockup']);
        App\Tag::create(['tag' => 'CSS3']);
        App\Tag::create(['tag' => 'HTML5']);
        App\Tag::create(['tag' => 'Javascript']);
        App\Tag::create(['tag' => 'OAuth']);
        App\Tag::create(['tag' => 'Firewall']);
        App\Tag::create(['tag' => 'Server']);
        App\Tag::create(['tag' => 'Big Data']);
        App\Tag::create(['tag' => 'Responsive']);
        App\Tag::create(['tag' => 'Dependency Injection']);
        App\Tag::create(['tag' => 'Photoshop']);
        App\Tag::create(['tag' => 'Less']);
        App\Tag::create(['tag' => 'Sass']);
        App\Tag::create(['tag' => 'Vue']);
        App\Tag::create(['tag' => 'Angular']);
        App\Tag::create(['tag' => 'React']);
        App\Tag::create(['tag' => 'NodeJS']);
        App\Tag::create(['tag' => 'Redux']);

        App\Setting::create([
            'site_name' => "Laravel's Blog",
            'address' => 'Bosanska Krupa, Bosnia and Hercegovina',
            'contact_number' => '00387 66 992 729',
            'contact_email' => 'info@teachr.com'
        ]);
    }
}
