<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    public function handleMessage(Request $request)
    {
        $userMessage = strtolower($request->input('message'));
        $reply = $this->generateReply($userMessage);

        return response()->json(['reply' => $reply]);
    }

    public function handleFilter(Request $request)
    {
        $countryId = $request->input('country_id');
        $maxPrice = $request->input('max_price');

        $query = Property::query()->where('state', 1); // Only active properties

        if ($countryId) {
            $query->where('country', $countryId);
        }

        if ($maxPrice) {
            $query->where('price', '<=', $maxPrice);
        }

        $properties = $query->with(['countryRelation', 'category'])->limit(5)->get();

        if ($properties->isEmpty()) {
            return response()->json(['reply' => "No properties found. Want me to try a different filter? <button id=\"reset-quiz\" onclick=\"resetWizard()\"
                class=\"bg-red-500 text-black px-3 py-1 rounded mt-2 hover:bg-red-600\">
            🔄 Restart Assistant
        </button>"]);
        }

        $response = "Here are some filtered properties:\n <button id=\"reset-quiz\" onclick=\"resetWizard()\"
                class=\"bg-red-500 text-black px-3 py-1 rounded mt-2 hover:bg-red-600\">
           Restart Assistant
        </button>";
        foreach ($properties as $p) {
            $propertyImage = 'https://investmentvisa.com/' . ltrim($p->mainimage, '/');
            $countryName = $p->countryRelation->name ?? 'Unknown Country';
            $categoryTitle = $p->category->title ?? 'Unknown Type';
            $location = $p->municipality_id ?? 'Unknown Location';

            // $priceFormatted = number_format((float) ($p->price ?? 0), 0, ',', '.');
            $rawPrice = $p->price ?: $p->min_price ?: 0;
            $priceFormatted = number_format((float) $rawPrice, 0, ',', '.');

            $priceLabel = $p->price ? "€{$priceFormatted}" : "From €{$priceFormatted}";


            $response .= "<br><img width='120px' src='{$propertyImage}' alt='{$p->title}'> ";
            $response .= "<div><h6>{$p->title}</h6> ({$categoryTitle}) in {$location}, {$countryName}: <b>{$priceLabel}</b></div></br>\n";
        }

        return response()->json(['reply' => $response]);
    }



    private function generateReply($message)
    {
        // Detect country from message
        $countryId = null;
        if (str_contains($message, 'greece')) {
            $countryId = 175;
        } elseif (str_contains($message, 'portugal')) {
            $countryId = 86;
        }

        // Start building query
        $query = Property::query();

        // Apply combined filter block
        $keywords = explode(' ', $message);
        $query->where(function ($q) use ($countryId, $keywords) {
            if ($countryId) {
                $q->where('country', $countryId);
            }

            $q->where(function ($subQuery) use ($keywords) {
                foreach ($keywords as $word) {
                    $subQuery->orWhere('title', 'like', "%$word%")
                        ->orWhere('summary', 'like', "%$word%")
                        ->orWhere('description', 'like', "%$word%");
                }
            });
        });

        // Eager load relationships and get top 5 results
        $properties = $query->with(['countryRelation', 'category'])->limit(5)->get();

        if ($properties->isEmpty()) {
            return "Sorry, I couldn't find any matching properties. Want me to try a different search? <button id=\"reset-quiz\" onclick=\"resetWizard()\"
                class=\"bg-red-500 text-black px-3 py-1 rounded mt-2 hover:bg-red-600\">
            Restart Assistant
        </button>";
        }

        // Build response message
        $response = "Here are some properties for you:\n";
        foreach ($properties as $p) {
            $propertyImage = 'https://investmentvisa.com/' . ltrim($p->mainimage, '/');
            $countryName = $p->countryRelation->name ?? 'Unknown Country';
            $categoryTitle = $p->category->title ?? 'Unknown Type';
            $location = $p->municipality_id ?? 'Unknown Location';
            $priceFormatted = number_format((float) ($p->price ?? 0), 0, ',', '.');

            $response .= "<br><img width='120px' src='{$propertyImage}' alt='{$p->title}'> ";
            $response .= "{$p->title} ({$categoryTitle}) in {$location}, {$countryName}: €{$priceFormatted}</br>\n";
        }

        return $response;
    }

    public function wizardResults(Request $request)
    {
        $data = $request->all();

        $reply = '';

        // 1. 🔍 Properties Query
        $propertiesQuery = Property::where('state', 1)
            ->with(['countryRelation', 'category']);

        // Budget Filter
        if (is_array($data['budgetRange'])) {
            $min = $data['budgetRange']['min'];
            $max = $data['budgetRange']['max'] ?? null;

            $propertiesQuery->where(function($q) use ($min, $max) {
                $q->whereRaw('CAST(price AS UNSIGNED) >= ?', [$min]);
                if ($max) {
                    $q->whereRaw('CAST(price AS UNSIGNED) <= ?', [$max]);
                }
            });
        } elseif ($data['budgetRange'] === 'low') {
            $propertiesQuery->orderByRaw('CAST(price AS UNSIGNED) ASC')->limit(5);
        } elseif ($data['budgetRange'] === 'luxury') {
            $propertiesQuery->orderByRaw('CAST(price AS UNSIGNED) DESC')->limit(5);
        }

        $properties = $propertiesQuery->limit(5)->get();

        if ($properties->isNotEmpty()) {
            $reply .= "<strong><i class='fas fa-house-user'></i> Properties for You:</strong><!--<button id='know-more-properties' class='bt_iv float-end'>Know More</button>--> <br>";
            foreach ($properties as $p) {
                $cleanPrice = $p->price ?: $p->min_price ?: 0;
                $priceFormatted = number_format((float) $cleanPrice, 0, ',', '.');
                if($priceFormatted === '0') {
                    $priceFormatted = "<span class='property-price' style='color: #AA2157;'>RESERVED</span>";
                }
                else {
                    $priceFormatted = "<span class='property-price'>€{$priceFormatted}</span>";
                }
                $propertyImage = 'https://investmentvisa.com/' . ltrim($p->mainimage, '/');
                $country = $p->countryRelation->name ?? 'Unknown';
                $title = $p->title;

                $reply .= "<div id='know-more-Properties' class='property-card card shadow my-2 flex grid-cols-2' style='display: flex; flex-direction: row; gap: 10px;'>
                        <div class='propety-image-container'>
                        <img class='property-image' src='{$propertyImage}' width='120' alt='{$title}'></div>
                       <div class='p-2'><strong>{$title}</strong><br>{$country} – {$priceFormatted}</div></div>";
            }
        }

        // 2. FAQs Query
        $faqQuery = Content::faqs()->limit(5);
        foreach ($data['interests'] as $term) {
            $faqQuery->orWhere('introtext', 'like', "%$term%");
        }
        foreach ($data['lifestyle'] as $term) {
            $faqQuery->orWhere('introtext', 'like', "%$term%");
        }
        $faqs = $faqQuery->get();

        if ($faqs->isNotEmpty()) {
            $reply .= "<strong><i class='far fa-question-circle'></i> FAQs:</strong><!--<button id='know-more-faqs' class='bt_iv float-end'>Know More</button>--><br>";
            foreach ($faqs as $faq) {
                $intro = Str::limit(strip_tags(preg_replace('/\{.*?\}/', '', $faq->introtext)), 150, '...');
                $reply .= "<div id='know-more-FAQs' class='my-2 card shadow p-2'><strong>{$faq->title}</strong>{$intro}</div>";
            }
        }

        // 3. News Query
        $newsQuery = Content::news()->limit(5);
        foreach ($data['interests'] as $term) {
            $newsQuery->orWhere('introtext', 'like', "%$term%");
        }
        foreach ($data['lifestyle'] as $term) {
            $newsQuery->orWhere('introtext', 'like', "%$term%");
        }
        $news = $newsQuery->get();

        if ($news->isNotEmpty()) {
            $reply .= "<strong><i class='far fa-newspaper'></i> News:</strong><!--<button id='know-more-news' class='bt_iv float-end'>Know More</button>--><br>";
            foreach ($news as $item) {
                $intro = Str::limit(strip_tags(preg_replace('/\{.*?\}/', '', $item->introtext)), 150, '...');
                $reply .= "<div id='know-more-NEWS' class='my-2 card shadow p-2'><strong>{$item->title}</strong>{$intro}</div>";
            }
        }

        if (empty($reply)) {
            $reply = "Couldn't find content matching your preferences. Want to try again?";
        }

        return response()->json(['reply' => $reply]);
    }


}
