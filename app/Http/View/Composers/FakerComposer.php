<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class FakerComposer
{
    public function fakeUsers()
    {
        $users = collect([
            [ 'name' => 'Johnny Depp', 'gender' => 'male' ],
            [ 'name' => 'Al Pacino', 'gender' => 'male' ],
            [ 'name' => 'Robert De Niro', 'gender' => 'male' ],
            [ 'name' => 'Kevin Spacey', 'gender' => 'male' ],
            [ 'name' => 'Denzel Washington', 'gender' => 'male' ],
            [ 'name' => 'Russell Crowe', 'gender' => 'male' ],
            [ 'name' => 'Brad Pitt', 'gender' => 'male' ],
            [ 'name' => 'Angelina Jolie', 'gender' => 'female' ],
            [ 'name' => 'Leonardo DiCaprio', 'gender' => 'male' ],
            [ 'name' => 'Tom Cruise', 'gender' => 'male' ],
            [ 'name' => 'John Travolta', 'gender' => 'male' ],
            [ 'name' => 'Arnold Schwarzenegger', 'gender' => 'male' ],
            [ 'name' => 'Sylvester Stallone', 'gender' => 'male' ],
            [ 'name' => 'Kate Winslet', 'gender' => 'female' ],
            [ 'name' => 'Christian Bale', 'gender' => 'male' ],
            [ 'name' => 'Morgan Freeman', 'gender' => 'male' ],
            [ 'name' => 'Keanu Reeves', 'gender' => 'male' ],
            [ 'name' => 'Nicolas Cage', 'gender' => 'male' ],
            [ 'name' => 'Hugh Jackman', 'gender' => 'male' ],
            [ 'name' => 'Edward Norton', 'gender' => 'male' ],
            [ 'name' => 'Bruce Willis', 'gender' => 'male' ],
            [ 'name' => 'Tom Hanks', 'gender' => 'male' ],
            [ 'name' => 'Charlize Theron', 'gender' => 'female' ],
            [ 'name' => 'Will Smith', 'gender' => 'male' ],
            [ 'name' => 'Sean Connery', 'gender' => 'male' ],
            [ 'name' => 'Keira Knightley', 'gender' => 'female' ],
            [ 'name' => 'Vin Diesel', 'gender' => 'male' ],
            [ 'name' => 'Matt Damon', 'gender' => 'male' ],
            [ 'name' => 'Richard Gere', 'gender' => 'male' ],
            [ 'name' => 'Catherine Zeta-Jones', 'gender' => 'female' ]
        ]);

        return $users->random(3)->map(function ($user) {
            return [
                'name' => $user['name'],
                'gender' => $user['gender'],
                'email' => strtolower(str_replace(' ', '', $user['name']) . '@left4code.com')
            ];
        });
    }

    public function fakePhotos()
    {
        $photos = [];
        for ($i = 0; $i < 15; $i++) {
            $photos[] = 'profile-' . rand(1, 15) . '.jpg';
        }
        return collect($photos)->random(10);
    }

    public function fakeImages()
    {
        $photos = [];
        for ($i = 0; $i < 15; $i++) {
            $photos[] = 'preview-' . rand(1, 4) . '.jpg';
        }
        return collect($photos)->random(3);
    }

    public function fakeTrueFalse()
    {
        return collect([0, 1, 1])->random(1);
    }

    public function fakeStocks()
    {
        return collect([
            rand(50, 220),
            rand(50, 120),
            rand(50, 50)
        ])->shuffle();
    }

    public function fakeProducts()
    {
        $products = collect([
            [ 'name' => 'Dell XPS 13', 'category' => 'PC & Laptop' ],
            [ 'name' => 'Apple MacBook Pro 13', 'category' => 'PC & Laptop' ],
            [ 'name' => 'Oppo Find X2 Pro', 'category' => 'Smartphone & Tablet' ],
            [ 'name' => 'Samsung Galaxy S20 Ultra', 'category' => 'Smartphone & Tablet' ],
            [ 'name' => 'Sony Master Series A9G', 'category' => 'Electronic' ],
            [ 'name' => 'Samsung Q90 QLED TV', 'category' => 'Electronic' ],
            [ 'name' => 'Nike Air Max 270', 'category' => 'Sport & Outdoor' ],
            [ 'name' => 'Nike Tanjun', 'category' => 'Sport & Outdoor' ],
            [ 'name' => 'Nikon Z6', 'category' => 'Photography' ],
            [ 'name' => 'Sony A7 III', 'category' => 'Photography' ]
        ]);

        return $products->shuffle();
    }

    public function fakeFiles()
    {
        $files = collect([
            [ 'file_name' => 'Celine Dion - Ashes.mp4', 'type' => 'MP4', 'size' => '20 MB' ],
            [ 'file_name' => 'Laravel 7', 'type' => 'Empty Folder', 'size' => '120 MB' ],
            [ 'file_name' => $this->fakeImages()->first(), 'type' => 'Image', 'size' => '1.2 MB' ],
            [ 'file_name' => 'Repository', 'type' => 'Folder', 'size' => '20 KB' ],
            [ 'file_name' => 'Resources.txt', 'type' => 'TXT', 'size' => '2.2 MB' ],
            [ 'file_name' => 'Routes.php', 'type' => 'PHP', 'size' => '1 KB' ],
            [ 'file_name' => 'Dota 2', 'type' => 'Folder', 'size' => '112 GB' ],
            [ 'file_name' => 'Documentation', 'type' => 'Empty Folder', 'size' => '4 MB' ],
            [ 'file_name' => $this->fakeImages()->first(), 'type' => 'Image', 'size' => '1.4 MB' ],
            [ 'file_name' => $this->fakeImages()->first(), 'type' => 'Image', 'size' => '1 MB' ]
        ]);

        return $files->shuffle();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $fakerData = [];
        for ($i = 0; $i < 20; $i++) {
            $fakerData[] = [
                'images' => $this->fakeImages(),
                'true_false' => $this->fakeTrueFalse(),
                'files' => $this->fakeFiles(),
                
            ];
        }

        $view->with('fakers', $fakerData);
    }
}
