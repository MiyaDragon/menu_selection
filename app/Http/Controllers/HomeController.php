<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeIndexRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * ホーム画面
     */
    public function __invoke(HomeIndexRequest $request)
    {
        $response = Http::timeout(3)
            ->get(
                'https://app.rakuten.co.jp/services/api/Recipe/CategoryRanking/20170426',
                [
                    'applicationId' => config('rakuten_api.application_id'),
                    'categoryId' => $request->category() ?? 10
                ]
            );

        try {
            $menus = $response->json()['result'];

            $menu = $menus[rand(0, count($menus) - 1)];

            $categories = $this->getCategory();

            return view('home', compact('menu', 'categories'));
        } catch (Exception $e) {
            echo $e;

            abort(401);
        }
    }

    /**
     * カテゴリ取得
     */
    private function getCategory()
    {
        $response = Http::timeout(3)
            ->get(
                'https://app.rakuten.co.jp/services/api/Recipe/CategoryList/20170426',
                [
                    'applicationId' => config('rakuten_api.application_id'),
                    'categoryType' => 'large',
                ]
            );

        $result = $response->json()['result']['large'];

        return array_column($result, 'categoryName', 'categoryId');
    }
}
