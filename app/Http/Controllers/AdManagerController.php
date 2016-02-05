<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Sapioweb\CrudHelper\CrudyController as CrudHelper;

class AdManagerController extends Controller
{
      /**
      * Create a new controller instance.
      *
      * @return void
      */
      public function __construct()
      {
            // installs global error and exception handlers
            \Rollbar::init(['access_token' => env('ROLLBAR_ACCESS_TOKEN')]);
      }

      /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function index($id)
      {
            $program = $this->showProgram($id);

            return view('program.adManager.index')->with([
                  'program' => $program
            ]);
      }

      public function showProgram($id)
      {
            $program = CrudHelper::show(new \App\Program, 'slug', $id, ['ad']);

            $program = $this->programLinter($program);

            return $program;
      }

      public function programLinter($program)
      {
            switch (true) {
                  case $program === null:
                        abort(404);
                        break;

                  default:
                        $program = $program->first();
                        break;
            }

            return $program;
      }

      /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function updateAd(Request $request, $id)
      {
            $program = $this->showProgram($id);

            $adData = [
                  'program_ad_id' => $program->slug,
                  'program_ad_title' => $program->titleStrong,
                  'destination_url' => url('/', $program->slug),
                  'program_ad_image_url' => url('/') . '/uploads/ads/ad_' . $program->slug. '.jpg',
                  'program_ad_subtitle' => $program->title,
                  'program_ad_description' => $program->bullet2,
                  'program_ad_category' => 'real estate',
                  'contextual_keywords' => 'closing costs;home assistance;buying home;real estate;',
            ];

            $ad = CrudHelper::createOrUpdate(new \App\Ad, 'program_ad_id', $id, $adData);

            $ad = $ad->first();

            if (is_null($ad)) {
                  return redirect()->route('program.ad.manager', $program->slug)->with([
                        'fail_message' => 'There was an isue with the ad, try again later...'
                  ]);
            }

            $ad = $ad->toArray();

            $program->ad()->sync([$ad['id']]);

            return redirect()->route('program.ad.manager', $program->slug)->with([
                  'success_message' => 'Ad has been updated...'
            ]);
      }
}
