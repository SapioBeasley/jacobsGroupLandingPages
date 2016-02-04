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
        $file = '../storage/feeds/ad-feed.csv';

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
