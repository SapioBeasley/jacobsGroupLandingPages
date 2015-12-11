<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Program;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $program = Program::where('slug', '=', $id)->first();

        $program = $this->programLinter($program);

        return view('index')->with([
            "titleStrong" => $program['titleStrong'],
            "title" => $program['title'],
            "secondHead" => $program['secondHead'],
            "bullet1" => $program['bullet1'],
            "bullet2" => $program['bullet2'],
            "disclaimerAdd" => $program['disclaimerAdd'],
            "slug" => $program['slug'],
        ]);
    }

    public function inquire(Request $request, $id)
    {
        $program = Program::where('slug', '=', $id)->first();

        $program = $this->programLinter($program);

        $request = $request->all();

        $data = array_merge($request, $program);

        $sendMail = Mail::send('email.inquire', ['data' => $data], function ($message) use ($data) {

            $message->from('inquire@jacobsgroupvegas.com', '[INQUIRE] ' . $data['first_name']);
            $message->to(env('INQUIRE_EMAIL', 'andreas@sapioweb.com'), 'Lead Gen')->subject('[INQUIRE] ' . $data['titleStrong'] . ' ' . $data['title']);

        });

        if ($sendMail !== 1) {
            return redirect()->back()->with('error_message', 'Something went wrong, please try again later.');
        }

        return redirect()->route('sendSuccess');
    }

    public function inquireSuccess()
    {
        return view('sendSuccess');
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
        // dd($id);
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

    public function programLinter($program)
    {
        switch (true) {
            case $program === null:
                abort(404);
                break;

            default:
                $program = $program->toArray();
                break;
        }

        return $program;
    }
}
