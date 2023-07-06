<?php

namespace App\Models;




class Post
{
    private static $blog_posts =  [
        [
        "title" => "New",
        "slug"=>"judul-post-pertama",
        "author" => "Me",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates quidem unde culpa eos placeat neque, iure odit qui perspiciatis, voluptate cum? Ab, alias. Alias quod ullam ad delectus eaque accusamus?"

    ],
    [
        "title" => "New 2",
        "slug"=>"judul-post-kedua",
        "author" => "Myslef",
        "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos libero cupiditate ullam tempore, quis earum ipsum eligendi eos, quam quidem, beatae doloribus deserunt asperiores aspernatur alias hic. Accusamus quibusdam velit, ipsa debitis quia aut! Debitis itaque facilis adipisci autem? Vitae at ducimus esse magnam repudiandae totam reiciendis exercitationem, sequi alias error dignissimos quam sed rerum tenetur maxime ullam eum debitis repellat incidunt nemo optio. Sint eos aspernatur fugit dolore porro animi quidem optio tempore ab? At, vero sequi nulla provident sunt repellat dicta iure laborum adipisci suscipit magnam consequatur odio necessitatibus alias doloribus dignissimos dolor. Veniam officia aliquid alias nisi."

    ]
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $post = static::all();

        // $post= [];
        // foreach ($posts as $p) {
        //     if($p["slug"] === $slug){
        //         $new_post = $p;
        //     }
        // }
        return $post->firstWhere('slug', $slug);

    }
}
