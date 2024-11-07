<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Destin Kendenan",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis pariatur dolore iusto, exercitationem magni quibusdam rerum debitis explicabo quidem consequuntur dicta? Facilis esse, perferendis aperiam consequuntur atque quisquam maxime molestias laborum similique sunt natus quidem reiciendis officia nostrum fugit exercitationem, voluptatibus tempore. Recusandae, iure. Quibusdam assumenda esse id dolorum. Libero voluptatum suscipit tenetur tempora quis architecto saepe itaque deserunt cumque, et eaque placeat rerum optio minus error iste, vitae praesentium hic neque vel, asperiores quas ipsum esse impedit? Veniam, minus?"
        ], 
        [
            "title" => "Judul Post Graciooo",
            "slug" => "judul-post-kedua",
            "author" => "Gracio ",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis numquam dignissimos, esse necessitatibus unde est ut aspernatur hic fuga illum sapiente culpa libero laudantium dicta autem nemo exercitationem cupiditate nulla iusto repudiandae voluptate? Vero ut magnam minima quis suscipit. Ea laboriosam iusto sint incidunt harum. Eligendi voluptate consequuntur accusantium nihil, architecto ab adipisci quos similique voluptates? Perferendis, ratione? Repudiandae, odit perferendis. Exercitationem vel provident numquam nesciunt, ex possimus rerum voluptatem voluptate vero sunt quis voluptatibus eveniet dolores iste sed. Eius reprehenderit nobis aspernatur eaque, autem harum facere porro quis minus maiores eum, ea officiis dicta repudiandae doloribus doloremque! Amet, error!"
        ]
    ];

    public static function all() {
        return self::$blog_posts;
    }

    public static function find($slug) {
        $posts = self::$blog_posts;
        $post = [];
        foreach ($posts as $p) {
            if($p["slug"] === $slug) {
                $post = $p;
            }
        }
        return $post;
    }
}
