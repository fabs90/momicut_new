<?php

namespace Tests\Unit;

use App\Models\CustomerReview;
use Log;
use Tests\TestCase;
class CustomerReviewTest extends TestCase
{
    /** @test */
    public function it_can_create_comments()
    {
        // Arange
        $data = [
            'username' => 'coba',
            'rating' => 5,
            'comments' => "mangap"
        ];

        //Act
        $task = CustomerReview::create($data);

        // Assert
        $this->assertInstanceOf(CustomerReview::class, $task);
        $this->assertEquals('coba', $task->username);

        // Clean up
        // $task->delete();
    }
    /** @test */
    public function it_can_delete_comments()
    {
        // Arrange
        $user = 'coba';
        $review = CustomerReview::factory()->create([
            'username' => $user,
            'rating' => 5,
            'comments' => "mangap"
        ]);

        // Act
        $review->delete();

        // Assert
        $this->assertDatabaseMissing('customer_reviews', [
            'id' => $review->id,
            'username' => $user,
        ]);
    }


}
