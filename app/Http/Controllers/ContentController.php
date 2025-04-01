<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function handleFaqs(Request $request)
    {
        $countries = $request->input('countries', []);
        $topics = $request->input('expatTopics', []);

        $faqsQuery = Content::faqs();

        // Optional: filter by country or topics in title/introtext
        if (!empty($countries)) {
            foreach ($countries as $id) {
                $faqsQuery->orWhere('introtext', 'like', "%{$this->getCountryName($id)}%");
            }
        }

        if (!empty($topics)) {
            foreach ($topics as $topic) {
                $faqsQuery->orWhere('introtext', 'like', "%$topic%");
            }
        }

        $faqs = $faqsQuery->limit(5)->get();

        if ($faqs->isEmpty()) {
            return response()->json(['reply' => "❌ No FAQs found. Want me to try something else?"]);
        }

        $reply = "<strong>❓ FAQs for you:</strong><br>";
        foreach ($faqs as $faq) {
            $reply .= "<div class='my-2'><strong>{$faq->title}</strong><br>{$faq->introtext}</div><br>";
        }

        return response()->json(['reply' => $reply]);
    }

    public function handleNews(Request $request)
    {
        $countries = $request->input('countries', []);
        $topics = $request->input('expatTopics', []);

        $newsQuery = Content::news();

        if (!empty($countries)) {
            foreach ($countries as $id) {
                $newsQuery->orWhere('introtext', 'like', "%{$this->getCountryName($id)}%");
            }
        }

        if (!empty($topics)) {
            foreach ($topics as $topic) {
                $newsQuery->orWhere('introtext', 'like', "%$topic%");
            }
        }

        $newsItems = $newsQuery->limit(5)->get();

        if ($newsItems->isEmpty()) {
            return response()->json(['reply' => "📭 No news found. Want to explore properties instead?"]);
        }

        $reply = "<strong>📰 Latest News:</strong><br>";
        foreach ($newsItems as $news) {
           // $reply .= "<div class='my-2'><strong>{$news->title}</strong><br>{$news->introtext}</div><br>";

            $cleanIntro = preg_replace('/\{.*?\}/', '', $news->introtext);
            // Strip tags and truncate
            $truncatedIntro = Str::limit(strip_tags($cleanIntro), 150, '...');
            // Build URL (if you have slugs or IDs)
            $url = url("/news/{$news->id}/" . Str::slug($news->title));
            // Build bubble
            $reply .= "<div class='my-2'><strong>{$news->title}</strong><br>{$truncatedIntro}<br>
                <a href='{$url}' target='_blank' class='btn btn-primary btn-sm text-blue-600 underline text-sm'>Read more</a>
                </div><br>";
        }

        return response()->json(['reply' => $reply]);
    }

    // Helper to convert country ID to name
    private function getCountryName($id)
    {
        $map = [
            86 => 'Greece', 175 => 'Portugal', 59 => 'Cyprus',
            135 => 'Malta', 100 => 'Hungary', 177 => 'Qatar', 3 => 'UAE'
        ];
        return $map[$id] ?? 'Unknown';
    }
}
