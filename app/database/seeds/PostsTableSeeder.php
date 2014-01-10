<?php

    class PostsTableSeeder extends DatabaseSeeder
    {

        public function run()
        {
            Post::create([
                "title"=>"music"
                ,"content"=>"I like playing guitar"
            ]);
 
        }
        
    }
?>
