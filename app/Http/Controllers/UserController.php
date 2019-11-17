<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use DB;


use Validator;
use App\Comment;
use App\Notification;
use App\Respondent;
use App\Topic;
use App\TopicResponse;
use Illuminate\Support\Facades\Redirect;
use App\Response;

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
        $topic = DB::table('topics')->where('link',$link)->first();
        if($topic==null) return Redirect('/home');
        // kiem tra loi
        if(false){
            echo "loi tum lum";
            return;
        }

        // end loi
        $lh = $request->input('lh');
        if($lh === null){
            $lh = 'default-user';
        }
        $respondent = new Respondent();
        $respondent->name = "";
        $respondent->email = $lh;
        $respondent->save();

        $topicResponse = new TopicResponse();
        $topicResponse->topic_id = $topic->id;
        $topicResponse->respondent_id = $respondent->id;
        $topicResponse->save();

        $question = DB::table('questions')->where('topic_id', $topic->id)->get();
        foreach($question as $ques){
            $questionType = DB::table('question_types')
            ->where('id', $ques->question_type_id)
            ->first();
            
            if($questionType->name === 'text'){
                $response = new Response();
                $response->topic_response_id = $topicResponse->id;
                $response->question_id = $ques->id;
                $response->answer = $request->input($ques->id);
                $response->save();
            }

            if($questionType->name === 'multiple-choice'){
                $response = new Response();
                $response->topic_response_id = $topicResponse->id;
                $response->question_id = $ques->id;
                $response->answer = $request->input($ques->id);
                $response->save();
            }

            if($questionType->name === 'checkboxes'){
                $responseChoices = DB::table('reponse_choice')
                ->where('question_id', $ques->id)
                ->get();
                foreach($responseChoices as $responseChoice){
                    if(!is_null($request->input($ques->id.'as'.$responseChoice->id))){
                        $response = new Response();
                        $response->topic_response_id = $topicResponse->id;
                        $response->question_id = $ques->id;
                        $response->answer = $request->input($ques->id.'as'.$responseChoice->id);
                        $response->save();
                    }
                }
            }
        }
        $notifi = new Notification();
        $notifi->content = "Người dùng " . $lh ." trả lời biểu mẫu " . $topic->name;
        $notifi->save();

        return Redirect()->route('getResponse',[$respondent->id]);
    }

    public function getTopicResponse($respondentId){
        
        $respondent = DB::table('respondent')->where('id', $respondentId)->first();
        if(is_null($respondent)) return Redirect('/home');
        $topicResponse = DB::table('topic_response')->where('respondent_id',$respondent->id)->first();

        $respondent->topicResponse = $topicResponse;
        $topic = DB::table('topics')->where('id',$topicResponse->topic_id)->first();
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

            $response = DB::table('reponse')
            ->where('question_id', $ques->id)
            ->where('topic_response_id',$topicResponse->id)
            ->get();
            $ques->responses = $response;
        }

        $topicResponse->topic = $topic;

        return view('user/response', ['respondent' => $respondent]);
    }

}