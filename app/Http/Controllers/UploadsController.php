<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Sapioweb\CrudHelper\CrudyController as CrudHelper;

class UploadsController extends Controller
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

      public function upload(Request $request, $id)
      {
            $program = $this->showProgram($id);

            $program = $program->first();

            $destinationPath = 'uploads'; // upload path

            $upload_success = $this->uploadSaveFile($request->file('file'), $destinationPath, $program->slug, $program);

            if ($upload_success) {
                  return response()->json([
                        'success' => 200,
                        'image' => $fileName
                  ])->withCookie(cookie('image', isset($fileName) ? $fileName : null, 4500));
            } else {
                  return response()->json('error', 400);
            }
      }

      public function uploadAd(Request $request, $id)
      {
            $ad = CrudHelper::show(new \App\Ad, 'program_ad_id', $id);

            $ad = $ad->first();

            if (is_null($ad)) {
                  return response()->json('No Ad found', 400);
            }

            $destinationPath = 'uploads/ads'; // upload path

            $upload_success = $this->uploadSaveFile($request->file('file'), $destinationPath, 'ad_' . $ad->program_ad_id);

            if ($upload_success) {
                  return response()->json([
                        'success' => 200,
                        'image' => $fileName
                  ])->withCookie(cookie('image', $fileName, 4500));
            } else {
                  return response()->json('error', 400);
            }
      }

      public function uploadSaveFile($file, $destination, $nameOfFile, $program = null)
      {
            $extension = $file->getClientOriginalExtension();
            $fileName = $nameOfFile . '.' . $extension;
            $upload_success = $file->move($destination, $fileName);

            if ($upload_success) {
                  $image = new \App\Image(['images_url' => $destination . '/' . $fileName]);
                  $program->image()->save($image);
            }

            return $upload_success;
      }

      public function showProgram($id)
      {
            $program = CrudHelper::show(new \App\Program, 'slug', $id);

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
                        $program = $program;
                        break;
            }

            return $program;
      }
}
