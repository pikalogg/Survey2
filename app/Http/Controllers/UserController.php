<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use DB;


use Validator;
use App\Comment;
use App\Topic;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
//
    public function index()
    {
        if (!Auth::check()){
            return Redirect('/login');
        }
        return view('user/index');

    }

    public function getTopic($link)
    {  
        $topic = DB::table('topics')->where('link',$link)->first();
        if($topic==null) return Redirect('/home');
        
        $question = DB::table('questions')->where('topic_id', $topic->id)->get();
        $topic->questions = $question;
        foreach($question as $ques){
            $questionType = DB::table('question_types')
            ->where('id', $ques->question_type_id)
            ->first();
            $ques->questionType = $questionType;
            $responseChoices = DB::table('reponse_choice')
            ->where('question_id', $ques->id)
            ->get();
            $ques->responseChoices = $responseChoices;
        }

        return view('user/topic', ['topic' => $topic]);
    }

    public function postTopic(Request $request, $link){
        $pika = "";

        $topic = DB::table('topics')->where('link',$link)->first();
        if($topic==null) return Redirect('/home');

        $question = DB::table('questions')->where('topic_id', $topic->id)->get();
        foreach($question as $ques){
            $questionType = DB::table('question_types')
            ->where('id', $ques->question_type_id)
            ->first();
            
            if($questionType->name === 'text'){
                $pika .= " cau 1: " . $request->input($ques->id);
            }

            if($questionType->name === 'multiple-choice'){
                $pika .= " cau 2: " . $request->input($ques->id);
            }

            if($questionType->name === 'checkboxes'){
                $pika .= " cau 3: ";
                $responseChoices = DB::table('reponse_choice')
                ->where('question_id', $ques->id)
                ->get();
                foreach($responseChoices as $response){
                    $pika .= " " . $request->input($ques->id.'as'.$response->id);
                }
            }
            

        }
        echo $pika;
    }


}