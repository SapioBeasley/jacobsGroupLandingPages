<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sapioweb\CrudHelper\CrudyController as CrudHelper;

use App\Program;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = CrudHelper::index(new \App\Program);

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
        $program = CrudHelper::show(new \App\Program, 'slug', $id);

        $program = $this->programLinter($program);

        return view('index')->with([
            'program' => $program
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
        $program = CrudHelper::show(new \App\Program, 'id', $id);

        $program = $this->programLinter($program);

        return view('program.edit')->with([
            'program' => $program
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = CrudHelper::destroy(new \App\Program, 'id', $id);

        return redirect()->back()
            ->with('success_message', 'Program Deleted');
    }

    public function inquire(Request $request, $id)
    {
        $program = CrudHelper::show(new \App\Program, 'slug', $id);

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

        return redirect()->route('sendSuccess', $program['id']);
    }

    public function inquireSuccess($id)
    {
        $program = CrudHelper::show(new \App\Program, 'id', $id);

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

    public function upload(Request $request, $id)
    {
        $program = CrudHelper::show(new \App\Program, 'id', $id);

        $destinationPath = 'uploads'; // upload path
        $extension = $request->file('file')->getClientOriginalExtension(); // getting file extension
        $fileName = $program->slug . '.' . $extension; // renameing image
        $upload_success = $request->file('file')->move($destinationPath, $fileName); // uploading file to given path

        if ($upload_success) {
            return response()->json([
                'success' => 200,
                'image' => $fileName
            ])->withCookie(cookie('image', $fileName, 4500));
        } else {
            return response()->json('error', 400);
        }
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

        return redirect()->route('index')
            ->with('success_message', 'New Property Added');
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

        return redirect()->route('program.edit', $program['id'])
            ->with('success_message', 'Property Updated');
    }
}
