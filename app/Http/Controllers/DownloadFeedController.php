<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Sapioweb\CrudHelper\CrudyController as CrudHelper;

class DownloadFeedController extends Controller
{
    public function downloadFeedCsv()
    {
        $file = '../storage/feeds/ad-feed-' . date('m-d-Y') . '.csv';

        $ads = CrudHelper::index(new \App\Ad)->get();

        $ads = $ads->toArray();

        $csvFile = fopen($file, 'w');

        $fields = [
            'ID',
            'Item title',
            'Destination URL',
            'Image URL',
            'Item subtitle',
            'Item description',
            'Item category',
            'Contextual keywords',
        ];

        fputcsv($csvFile, $fields);

        foreach ($ads as $ad) {
            $inloadToCsv = [
                'ID' => $ad['program_ad_id'],
                'Item title' => $ad['program_ad_title'],
                'Destination URL' => $ad['destination_url'],
                'Image URL' => $ad['program_ad_image_url'],
                'Item subtitle' => $ad['program_ad_subtitle'],
                'Item description' => $ad['program_ad_description'],
                'Item category' => $ad['program_ad_category'],
                'Contextual keywords' => $ad['contextual_keywords'],
            ];

             fputcsv($csvFile, $inloadToCsv);
        }

        fclose($csvFile);

        return response()->download($file);
    }
}
