<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

//use PHPUnit\Framework\TestCase;

class LikesTest extends TestCase
{

    // using db transactions means records are rolled back after test so db doesn't get bloated
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */

     /** @test  */
    public function a_user_can_like_a_post()
    {
        // given I have a post
        $post = factory(\App\Post::class)->create();
   
   // and a user

   $user = factory(\App\User::class)->create();

   // and that user is logged in 

   $this->actingAs($user);

   // when they like a post

   $post->like();

   //then we should see evidence in the database and the post should be liked

   $this->assertDatabaseHas('likes', [
       'user_id' => $user->id,
       'likeable_id' => $post->id,
       'likeable_type' => get_class($post)
   ]);

   $this->assertTrue($post->isLiked());
   
    }

         /** @test  */
         public function a_user_can_unlike_a_post()
         {
             // given I have a post
             $post = factory(\App\Post::class)->create();
        
        // and a user
     
        $user = factory(\App\User::class)->create();
     
        // and that user is logged in 
     
        $this->actingAs($user);
     
        // when they like a post
     
        $post->like();
        $post->unlike();
     
        //then we should see evidence in the database and the post should be liked
     
        $this->assertDatabaseMissing('likes', [
            'user_id' => $user->id,
            'likeable_id' => $post->id,
            'likeable_type' => get_class($post)
        ]);
     
        $this->assertFalse($post->isLiked());
        
         }

            /** @test  */
            public function a_user_can_toggle_a_post_like_status()
            {
                // given I have a post
                $post = factory(\App\Post::class)->create();
           
           // and a user
        
           $user = factory(\App\User::class)->create();
        
           // and that user is logged in 
        
           $this->actingAs($user);
        
           // when they like a post
        
           $post->toggle();
        
           $this->assertTrue($post->isLiked());

           $post->toggle();

           $this->assertFalse($post->isLiked());
           
            }

                        /** @test  */
                        public function a_post_knows_how_many_likes_it_has()
                        {
                            // given I have a post
                            $post = factory(\App\Post::class)->create();
                       
                       // and a user
                    
                       $user = factory(\App\User::class)->create();
                    
                       // and that user is logged in 
                    
                       $this->actingAs($user);
                    
                       // when they like a post
                    
                       $post->toggle();
                    
                       $this->assertEquals(1, $post->likesCount);
                        }
}
