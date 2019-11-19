<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Validator;
use App\Comment;
use App\Notification;
use App\Question;
use App\Respondent;
use App\Topic;
use App\TopicResponse;
use Illuminate\Support\Facades\Redirect;
use App\Response;
use App\ResponseChoice;

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
        $topic = Topic::where('user_id', Auth::user()->id)
        ->paginate(3);

        return view('user/index', ['topics'=>$topic]);

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

            if($questionType->name === 'checkboxes'){
                $response = new Response();
                $response->topic_response_id = $topicResponse->id;
                $response->question_id = $ques->id;
                $response->answer = $request->input($ques->id);
                $response->save();
            }

            if($questionType->name === 'multiple-choice'){
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
    public function createTopic(){
        if (!Auth::check()){
            return Redirect('/login');
        }
        $topic = new Topic();
        $topic->name = "Mẫu không có tiêu đề";
        $topic->description = "không có miêu tả";
        $topic->user_id = Auth::user()->id;
        $str = str_replace("/", "", Hash::make("topic". $topic->id));
        $str = str_replace(".", "", $str);
        $topic->link = str_replace("$", "", $str);
        $topic->save();

        return Redirect("/topic/$topic->link");

    }

    public function getCreateTopic($link){
        if (!Auth::check()){
            return Redirect('/login');
        }
        $topic = DB::table('topics')->Where('link', $link)->first();
        if(is_null($topic)){
            return Redirect('/');
        }
        if($topic->user_id !== Auth::user()->id){
            return Redirect('/');
        }
        return view('user/createtopic');
    }

    public function postCreateTopic(Request $request, $link){
        $topic = Topic::where('link', $link)->first();
        if (!is_null($request->input('title'))){
            $topic->name = $request->input('title');
        }
        if (!is_null($request->input('description'))){
            $topic->name = $request->input('description');
        }
        $topic->save();
        // số lượng câu hỏi đã tạo
        $amountques = $request->input('amountques');
        for($i = 1; $i <= $amountques; $i++){
            $questionContent = $request->input("ques" . $i);
            $questionType = $request->input("type" . $i);
            if(!is_null($questionContent)){
                if($questionContent === ""){
                    $questionContent = "Câu hỏi không có tiêu đề";
                }
                $question = new Question();
                $question->topic_id = $topic->id;
                $question->content = $questionContent;
                $question->question_type_id = $questionType;
                $question->save();

                switch ($questionType) {
                    case '0':
                        break;
                    case '1':
                        $amountanr = $request->input("amountanr" . $i);
                        for($j = 1; $j < $amountanr; $j++){
                            $choiceContent = $request->input("ques" . $i . "answerr" . $j);
                            if(!is_null($choiceContent)){
                                $responseChoice = new ResponseChoice();
                                $responseChoice->question_id = $question->id;
                                $responseChoice->content = $choiceContent;
                                $responseChoice->save();
                            }

                        }
                        break;
                    case '2':
                        $amountanc = $request->input("amountanc" . $i);
                        for($j = 1; $j < $amountanc; $j++){
                            $choiceContent = $request->input("ques" . $i . "answerc" . $j);
                            if(!is_null($choiceContent)){
                                $responseChoice = new ResponseChoice();
                                $responseChoice->question_id = $question->id;
                                $responseChoice->content = $choiceContent;
                                $responseChoice->save();
                            }

                        }
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }


        return Redirect('/'); 

    }

}