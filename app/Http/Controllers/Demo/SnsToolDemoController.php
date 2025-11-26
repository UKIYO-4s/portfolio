<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class SnsToolDemoController extends Controller
{
    /**
     * ダッシュボード
     */
    public function index()
    {
        $stats = [
            'total_likes' => 12543,
            'total_comments' => 2847,
            'total_reach' => 45621,
            'engagement_rate' => 8.7
        ];

        $recentPosts = $this->getRecentPosts();

        return view('demo.sns-tool.index', compact('stats', 'recentPosts'));
    }

    /**
     * 投稿一覧
     */
    public function posts()
    {
        $posts = $this->getAllPosts();

        return view('demo.sns-tool.posts', compact('posts'));
    }

    /**
     * 新規投稿作成
     */
    public function postsCreate()
    {
        return view('demo.sns-tool.posts-create');
    }

    /**
     * 予約投稿カレンダー
     */
    public function schedule()
    {
        $scheduledPosts = $this->getScheduledPosts();

        return view('demo.sns-tool.schedule', compact('scheduledPosts'));
    }

    /**
     * テンプレート管理
     */
    public function templates()
    {
        $templates = $this->getTemplates();

        return view('demo.sns-tool.templates', compact('templates'));
    }

    /**
     * 効果測定
     */
    public function analytics()
    {
        $stats = [
            'total_likes' => 12543,
            'total_comments' => 2847,
            'total_reach' => 45621,
            'engagement_rate' => 8.7,
            'growth' => [
                'likes' => 12.5,
                'comments' => 8.3,
                'reach' => 15.7,
                'engagement' => 5.2
            ]
        ];

        $platformStats = [
            'Instagram' => [
                'posts' => 45,
                'likes' => 8234,
                'comments' => 1523,
                'reach' => 28934
            ],
            'GMB' => [
                'posts' => 23,
                'likes' => 4309,
                'comments' => 1324,
                'reach' => 16687
            ]
        ];

        return view('demo.sns-tool.analytics', compact('stats', 'platformStats'));
    }

    /**
     * フィード最適化ツール
     */
    public function feed()
    {
        $scheduledPosts = [
            [
                'id' => 1,
                'platform' => 'Instagram',
                'title' => '新商品のご紹介',
                'scheduled_at' => '2024-11-26 10:00',
                'status' => 'scheduled',
                'thumbnail' => null
            ],
            [
                'id' => 2,
                'platform' => 'GMB',
                'title' => '営業時間変更のお知らせ',
                'scheduled_at' => '2024-11-26 14:00',
                'status' => 'scheduled',
                'thumbnail' => null
            ],
            [
                'id' => 3,
                'platform' => 'Instagram',
                'title' => 'お客様の声をご紹介',
                'scheduled_at' => '2024-11-27 11:00',
                'status' => 'scheduled',
                'thumbnail' => null
            ]
        ];

        $recommendedTimes = [
            ['day' => '月曜日', 'times' => ['10:00', '18:00', '21:00']],
            ['day' => '火曜日', 'times' => ['10:00', '12:00', '19:00']],
            ['day' => '水曜日', 'times' => ['10:00', '18:00', '20:00']],
            ['day' => '木曜日', 'times' => ['10:00', '12:00', '19:00']],
            ['day' => '金曜日', 'times' => ['10:00', '18:00', '21:00']],
            ['day' => '土曜日', 'times' => ['11:00', '15:00', '20:00']],
            ['day' => '日曜日', 'times' => ['11:00', '14:00', '19:00']]
        ];

        $suggestedHashtags = [
            ['tag' => '#ビジネス', 'posts' => '1.2M'],
            ['tag' => '#マーケティング', 'posts' => '890K'],
            ['tag' => '#SNS運用', 'posts' => '456K'],
            ['tag' => '#Instagram活用', 'posts' => '234K'],
            ['tag' => '#集客', 'posts' => '567K'],
            ['tag' => '#店舗経営', 'posts' => '345K']
        ];

        $metrics = [
            'click_rate' => 4.2,
            'saves' => 1234,
            'reach' => 45621,
            'impressions' => 89432
        ];

        return view('demo.sns-tool.feed', compact('scheduledPosts', 'recommendedTimes', 'suggestedHashtags', 'metrics'));
    }

    /**
     * リール/ショート最適化ツール
     */
    public function reels()
    {
        $recentReels = [
            [
                'id' => 1,
                'title' => '商品紹介リール',
                'platform' => 'Instagram',
                'views' => 12500,
                'completion_rate' => 68.5,
                'follows_gained' => 45,
                'duration' => '0:30',
                'created_at' => '2024-11-24'
            ],
            [
                'id' => 2,
                'title' => 'Behind the Scenes',
                'platform' => 'YouTube',
                'views' => 8900,
                'completion_rate' => 72.3,
                'follows_gained' => 32,
                'duration' => '0:45',
                'created_at' => '2024-11-22'
            ],
            [
                'id' => 3,
                'title' => 'お客様インタビュー',
                'platform' => 'Instagram',
                'views' => 15600,
                'completion_rate' => 58.2,
                'follows_gained' => 67,
                'duration' => '0:60',
                'created_at' => '2024-11-20'
            ]
        ];

        $templates = [
            [
                'id' => 1,
                'name' => '商品紹介テンプレート',
                'duration' => '15秒',
                'style' => 'プロモーション'
            ],
            [
                'id' => 2,
                'name' => 'Before/Afterテンプレート',
                'duration' => '30秒',
                'style' => 'ビフォーアフター'
            ],
            [
                'id' => 3,
                'name' => 'チュートリアルテンプレート',
                'duration' => '60秒',
                'style' => 'How-to'
            ],
            [
                'id' => 4,
                'name' => 'お客様の声テンプレート',
                'duration' => '30秒',
                'style' => 'テスティモニアル'
            ]
        ];

        $metrics = [
            'total_views' => 156800,
            'avg_completion_rate' => 65.4,
            'total_follows' => 234,
            'total_reels' => 24
        ];

        $trendingAudio = [
            ['name' => 'トレンド音源 #1', 'uses' => '2.3M'],
            ['name' => 'トレンド音源 #2', 'uses' => '1.8M'],
            ['name' => 'トレンド音源 #3', 'uses' => '1.5M'],
            ['name' => 'トレンド音源 #4', 'uses' => '1.2M']
        ];

        return view('demo.sns-tool.reels', compact('recentReels', 'templates', 'metrics', 'trendingAudio'));
    }

    /**
     * 最近の投稿を取得（5件）
     */
    private function getRecentPosts()
    {
        $allPosts = $this->getAllPosts();
        return array_slice($allPosts, 0, 5);
    }

    /**
     * 全投稿を取得（8件）
     */
    private function getAllPosts()
    {
        return [
            [
                'id' => 1,
                'platform' => 'Instagram',
                'status' => 'Published',
                'title' => 'New Product Launch 🚀',
                'content' => 'Check out our latest product! Amazing features and beautiful design.',
                'scheduled_at' => '2024-11-25 10:00',
                'published_at' => '2024-11-25 10:00',
                'likes' => 234,
                'comments' => 45,
                'reach' => 1523
            ],
            [
                'id' => 2,
                'platform' => 'GMB',
                'status' => 'Published',
                'title' => 'Grand Opening Event 🎉',
                'content' => 'Join us for our grand opening! Special offers available.',
                'scheduled_at' => '2024-11-24 14:30',
                'published_at' => '2024-11-24 14:30',
                'likes' => 189,
                'comments' => 67,
                'reach' => 2145
            ],
            [
                'id' => 3,
                'platform' => 'Instagram',
                'status' => 'Scheduled',
                'title' => 'Behind the Scenes 📸',
                'content' => 'A sneak peek at how we create our products...',
                'scheduled_at' => '2024-11-26 16:00',
                'published_at' => null,
                'likes' => 0,
                'comments' => 0,
                'reach' => 0
            ],
            [
                'id' => 4,
                'platform' => 'Instagram',
                'status' => 'Published',
                'title' => 'Customer Review Spotlight ⭐',
                'content' => 'Thank you for your amazing feedback! We love our customers.',
                'scheduled_at' => '2024-11-23 11:00',
                'published_at' => '2024-11-23 11:00',
                'likes' => 567,
                'comments' => 123,
                'reach' => 3421
            ],
            [
                'id' => 5,
                'platform' => 'GMB',
                'status' => 'Published',
                'title' => 'Holiday Special Hours 🎄',
                'content' => 'We will be open during holidays! Check our special hours.',
                'scheduled_at' => '2024-11-22 09:00',
                'published_at' => '2024-11-22 09:00',
                'likes' => 145,
                'comments' => 34,
                'reach' => 1876
            ],
            [
                'id' => 6,
                'platform' => 'Instagram',
                'status' => 'Draft',
                'title' => 'Upcoming Sale Announcement 🏷️',
                'content' => 'Get ready for our biggest sale of the year!',
                'scheduled_at' => null,
                'published_at' => null,
                'likes' => 0,
                'comments' => 0,
                'reach' => 0
            ],
            [
                'id' => 7,
                'platform' => 'GMB',
                'status' => 'Scheduled',
                'title' => 'Team Introduction 👋',
                'content' => 'Meet our amazing team members who make everything possible!',
                'scheduled_at' => '2024-11-27 10:30',
                'published_at' => null,
                'likes' => 0,
                'comments' => 0,
                'reach' => 0
            ],
            [
                'id' => 8,
                'platform' => 'Instagram',
                'status' => 'Published',
                'title' => 'Tips & Tricks Tuesday 💡',
                'content' => 'Here are 5 tips to get the most out of our products!',
                'scheduled_at' => '2024-11-21 13:00',
                'published_at' => '2024-11-21 13:00',
                'likes' => 423,
                'comments' => 89,
                'reach' => 2934
            ]
        ];
    }

    /**
     * 予約投稿を取得（15件）
     */
    private function getScheduledPosts()
    {
        return [
            ['date' => '2024-11-26', 'count' => 2, 'posts' => [
                ['time' => '10:00', 'title' => 'Morning Post', 'platform' => 'Instagram'],
                ['time' => '16:00', 'title' => 'Behind the Scenes', 'platform' => 'Instagram']
            ]],
            ['date' => '2024-11-27', 'count' => 3, 'posts' => [
                ['time' => '10:30', 'title' => 'Team Introduction', 'platform' => 'GMB'],
                ['time' => '14:00', 'title' => 'Product Feature', 'platform' => 'Instagram'],
                ['time' => '18:00', 'title' => 'Evening Update', 'platform' => 'GMB']
            ]],
            ['date' => '2024-11-28', 'count' => 1, 'posts' => [
                ['time' => '11:00', 'title' => 'Thankful Thursday', 'platform' => 'Instagram']
            ]],
            ['date' => '2024-11-29', 'count' => 2, 'posts' => [
                ['time' => '09:00', 'title' => 'Friday Motivation', 'platform' => 'Instagram'],
                ['time' => '15:00', 'title' => 'Weekend Preview', 'platform' => 'GMB']
            ]],
            ['date' => '2024-11-30', 'count' => 3, 'posts' => [
                ['time' => '10:00', 'title' => 'Weekend Special', 'platform' => 'Instagram'],
                ['time' => '13:00', 'title' => 'Flash Sale', 'platform' => 'Instagram'],
                ['time' => '17:00', 'title' => 'Store Hours', 'platform' => 'GMB']
            ]],
            ['date' => '2024-12-01', 'count' => 2, 'posts' => [
                ['time' => '11:00', 'title' => 'December Kickoff', 'platform' => 'Instagram'],
                ['time' => '16:00', 'title' => 'Holiday Prep', 'platform' => 'GMB']
            ]],
            ['date' => '2024-12-02', 'count' => 2, 'posts' => [
                ['time' => '10:00', 'title' => 'New Week Goals', 'platform' => 'Instagram'],
                ['time' => '14:30', 'title' => 'Customer Spotlight', 'platform' => 'GMB']
            ]]
        ];
    }

    /**
     * テンプレートを取得（5件）
     */
    private function getTemplates()
    {
        return [
            [
                'id' => 1,
                'name' => 'Product Announcement',
                'platform' => 'Instagram',
                'content' => 'Excited to announce our new [PRODUCT NAME]! 🎉\n\nFeatures:\n✨ [Feature 1]\n✨ [Feature 2]\n✨ [Feature 3]\n\nAvailable now! Link in bio. 🔗',
                'used_count' => 12,
                'category' => 'Product'
            ],
            [
                'id' => 2,
                'name' => 'Customer Review',
                'platform' => 'Instagram',
                'content' => '⭐⭐⭐⭐⭐ Review Alert!\n\n"[CUSTOMER QUOTE]"\n\nThank you [CUSTOMER NAME] for the amazing feedback! 💙\n\n#CustomerLove #Reviews',
                'used_count' => 8,
                'category' => 'Engagement'
            ],
            [
                'id' => 3,
                'name' => 'Business Hours Update',
                'platform' => 'GMB',
                'content' => '📍 [OCCASION] Hours Update\n\nWe will be open:\n🕐 [DAY]: [HOURS]\n🕐 [DAY]: [HOURS]\n\nSee you soon! 👋',
                'used_count' => 15,
                'category' => 'Information'
            ],
            [
                'id' => 4,
                'name' => 'Behind the Scenes',
                'platform' => 'Instagram',
                'content' => '👀 Behind the scenes at [YOUR BUSINESS]!\n\nWe love what we do, and we can\'t wait to share it with you. 💪\n\n#BTS #TeamWork #Passion',
                'used_count' => 6,
                'category' => 'Engagement'
            ],
            [
                'id' => 5,
                'name' => 'Sale Announcement',
                'platform' => 'Instagram',
                'content' => '🏷️ SALE ALERT! 🏷️\n\n[XX]% OFF on [PRODUCTS]!\n⏰ [START DATE] - [END DATE]\n\nDon\'t miss out! Shop now 🛍️\n\n#Sale #Discount #Shopping',
                'used_count' => 9,
                'category' => 'Promotion'
            ]
        ];
    }
}
