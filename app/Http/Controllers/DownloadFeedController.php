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

        $programs = CrudHelper::index(new \App\Program)->get();

        $programs = $programs->toArray();

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

        foreach ($programs as $program) {
            $inloadToCsv = [
                'ID' => $program['slug'],
                'Item title' => $program['titleStrong'],
                'Destination URL' => url('/', $program['slug']),
                'Image URL' => url('/', $program['slug']) . '/ads/' . $program['slug']. '.jpg',
                'Item subtitle' => $program['title'],
                'Item description' => $program['bullet2'],
                'Item category' => 'real estate',
                'Contextual keywords' => 'closing costs;home assistance;buying home;real estate;',
            ];

             fputcsv($csvFile, $inloadToCsv);
        }

        fclose($csvFile);

        return response()->download($file);
    }
}
