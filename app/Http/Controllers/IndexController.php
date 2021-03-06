<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use GuzzleHttp\Exception\RequestException;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sapioweb\CrudHelper\CrudyController as CrudHelper;

use App\Program;

class IndexController extends Controller
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
      public function index()
      {
            $programs = CrudHelper::index(new \App\Program, ['ad'])->get();

            return view('program.index')->with([
                  'programs' => $programs
            ]);
      }

      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function show($id)
      {
            $program = $this->showProgram($id, ['image'])->first();

            if ($program === null) {
                  abort(404);
            }

            return view('index')->with([
                  'program' => $program->toArray()
            ]);
      }

      /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function edit($id)
      {
            $program = $this->showProgram($id);

            return view('program.edit')->with([
                  'program' => $program->first()
            ]);
      }

      public function showProgram($id, $with = [])
      {
            $program = CrudHelper::show(new \App\Program, 'slug', $id, $with);

            $program = $this->programLinter($program);

            return $program;
      }

      /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function destroy($id)
      {
            $program = CrudHelper::destroy(new \App\Program, $id);

            return redirect()->back()
                  ->with('success_message', 'Program Deleted');
      }

      public function inquire(Request $request, $id)
      {
            $program = $this->showProgram($id);

            $program = $program->first();

            $request = $request->all();

            $data = array_merge($request, $program->toArray());

            $sendMail = $this->sendInquire($data);

            return redirect()->route('sendSuccess', $program->slug);
      }

      public function sendInquire($data)
      {
            $sendInquire = Mail::send('email.inquire', ['data' => $data], function ($message) use ($data) {

                  $message->from('inquire@jacobsgroupvegas.com', '[INQUIRE] ' . $data['first_name']);
                  $message->to(env('INQUIRE_EMAIL', 'andreas@sapioweb.com'), 'Lead Gen')->subject('[INQUIRE] ' . $data['titleStrong'] . ' ' . $data['title']);

            });

            if ($sendInquire !== 1) {
                  return redirect()->back()->with('error_message', 'Something went wrong, please try again later.');
            }

            $this->sendToFollowupBoss($data);

            return $sendInquire;
      }

      public function sendToFollowupBoss($data)
      {
            $client = new \GuzzleHttp\Client();

            $actionPlans = $client->request('GET', 'https://api.followupboss.com/v1/actionPlans', [
                  'auth' => [
                        env('FOLLOW_UP_BOSS_KEY'),
                        ''
                  ],
            ]);

            $actionPlans = json_decode($actionPlans->getBody());

            $actionPlans = $actionPlans->actionPlans;

            foreach ($actionPlans as $actionPlanKey => $actionPlanValue) {
                  if ($actionPlanValue->name !== "Buyers Engagement emails") {
                        unset($actionPlans[$actionPlanKey]);
                        continue;
                  }

                  $actionPlanId = $actionPlans[$actionPlanKey]->id;
            }

            $response = $client->request('POST', 'https://api.followupboss.com/v1/events', [
                  'auth' => [
                        env('FOLLOW_UP_BOSS_KEY'),
                        ''
                  ],
                  'form_params' => [
                        'source' => $data['titleStrong'] . ' Program',
                        'system' => 'Jacobs Group Vegas',
                        'type' => 'Inquiry',
                        'message' => '[INQUIRE] ' . $data['titleStrong'],
                        'person' => [
                              'firstName' => $data['first_name'],
                              'lastName' => '',
                              'emails' => [
                                    [
                                          'value' => $data['email']
                                    ],
                              ],
                              'phones' => [
                                    [
                                          'value' => $data['phone']
                                    ]
                              ],
                              'stage' => [
                                    'value' => 'Lead'
                              ],
                              'tags' => [
                                    'value' => $data['titleStrong']
                              ],
                        ]
                  ]
            ]);


            $person = json_decode($response->getBody());

            $personId = $person->id;

            try {
                  $addPersonToAction = $client->request('POST', 'https://api.followupboss.com/v1/actionPlansPeople', [
                        'auth' => [
                              env('FOLLOW_UP_BOSS_KEY'),
                              ''
                        ],
                        'form_params' => [
                              'personId' => $personId,
                              'actionPlanId' => $actionPlanId
                        ],
                  ]);
            } catch (RequestException $e) {

                  $addPersonToAction = [
                        'success' => 'fail',
                        'code' => $e->getCode()
                  ];
            }

            return;
      }

      public function inquireSuccess($id)
      {
            $program = $this->showProgram($id);

            $program = $program->first();

            $titleStrong = $program->titleStrong;
            $title = $program->title;
            $slug = $program->slug;

            return view('sendSuccess')->with([
                  'program' => $program,
                  'titleStrong' => $program->titleStrong,
                  'title' => $program->title,
                  'slug' => $program->slug,
                  'disclaimerAdd' => $program->disclaimerAdd,
            ]);
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

      /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function create()
      {
            return view('program.create');
      }

      /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
      public function store(Request $request)
      {
            $createData = $request->all();

            $createData['slug'] = CrudHelper::slugify($createData['titleStrong'] . ' ' . $createData['title']);

            $program = Program::create($createData);

            return redirect()->route('program.edit', $program['slug'])
                  ->with('success_message', 'New Program Added, next add your image and manage your ad');
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
            $program = CrudHelper::show(new \App\Program, 'id', $id);

            foreach ($request->all() as $key => $value) {
                  $updateData[$key] = $value;
            }

            unset($updateData['_method']);
            unset($updateData['_token']);

            $updateData['slug'] =  CrudHelper::slugify($updateData['titleStrong'] . ' ' . $updateData['title']);

            $program->update($updateData);

            $program = $this->programLinter($program);

            $program = $program->first();

            return redirect()->route('program.edit', $program['slug'])
                  ->with('success_message', 'Property Updated');
      }
}
