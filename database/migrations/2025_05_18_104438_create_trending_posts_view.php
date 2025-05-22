<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTrendingPostsView extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE VIEW trending_posts_view AS
            SELECT
                id,
                topic_id,
                caption,
                clean_vote,
                comment_count,
                view,
                created_at,
                DATEDIFF(CURDATE(), created_at) AS days_since_release,
                (
                    (4 * clean_vote) +
                    (2 * LOG(comment_count + 1)) +
                    LOG(view + 1)
                ) / POW(GREATEST(DATEDIFF(CURDATE(), created_at), 1), 1.2) AS trending_score
            FROM posts
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS trending_posts_view");
    }
}
