<main>
    <div id="header">
        <div class="container-fluid">
            <a href="/" class="btn-header btn-back" ><i class="fas fa-long-arrow-alt-left"></i></a>
            <?php
                $share = str_replace("topic", "form", url()->current());
            ?>
            <?php
                $delete = str_replace("topic", "delete", url()->current());
            ?>
            <a href="{{$delete}}" style="right: 110px;" class="btn-header"><i class="fas fa-trash-alt"></i></a>
            <a href="{{$share}}" style="right: 70px;"  class="btn-header"><i class="fas fa-share-alt"></i></a>            
            <a href="#" class="btn-header btn-setting"><i class="fas fa-cog"></i></a>
        </div>
    </div>
    <div class="content">
        <div class="tab" style="
    max-width: 720px;
">
            <div class="" >
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="question-tab" data-toggle="tab" href="#question" role="tab" aria-controls="question" aria-selected="true">Câu hỏi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Answer-tab" data-toggle="tab" href="#Answer" role="tab" aria-controls="Answer" aria-selected="false">Trả lời</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="question" role="tabpanel" aria-labelledby="question-tab">
                        <form id="create-form" action="" method="POST">
                            {{ csrf_field() }}
                            <input id="amountques" type="text" name="amountques" value="0" hidden>
                            <div id="listquestion">
                            <script src="../nts/js/createtopic.js"></script>  
                                <div class="one_zone title_zone" >
                                    <input id="title_input" type="text" name="title" value="{{$topic->name}}" placeholder="Tiêu đề">
                                    <br>
                                    <textarea id="description_input" name="description" placeholder="Miêu tả">{{$topic->description}}</textarea>
                                    
                                </div>
                                @foreach($topic->questions as $question)
                                <script>
                                    addQuestion();
                                    document.querySelector('#select' + count).value = "{{$question->question_type_id}}";
                                    document.querySelector('#select' + count).click();
                                    document.getElementById('questitle' + count).value = "{{$question->content}}";
                                    if ({{$question->question_type_id}}==1){
                                        var countChoice = 1;
                                        @foreach($question->responseChoices as $responseChoice)
                                            document.querySelector('#ques' + count + "answerr" + countChoice).value = "{{$responseChoice->content}}";
                                            countChoice++;
                                            document.querySelector('#add-choice' + count).click();
                                        @endforeach
                                    }
                                    if ({{$question->question_type_id}}==2){
                                        var countChoice = 1;
                                        @foreach($question->responseChoices as $responseChoice)
                                            document.querySelector('#ques' + count + "answerc" + countChoice).value = "{{$responseChoice->content}}";
                                            countChoice++;
                                            document.querySelector('#add-choice' + count).click();
                                        @endforeach
                                    }
                                </script>
                                @endforeach
                                
                            </div>
                            
                            <div style="margin: 10px 10% 10px 10%; width: 80%; height: 1px; background-color: #AAAAAA "></div>
                            <input style="width: 20%; margin: 0 40% 10px;" class="btn btn-success" type="submit" value="Lưu Form">
                        </form>
                        <span class="add-question-span" onclick="addQuestion()">
                            <i style="margin: 7px 5px 5px 8px;;" class="fas fa-plus"></i>
                        </span>
                        <script>
                            addQuestion();


                        </script>
                    </div>
                    
                    <div class="tab-pane fade" id="Answer" role="tabpanel" aria-labelledby="Answer-tab">
            
                        <div style="margin: 20px ; padding-bottom: 30px;">
                            <table id="customers">
                                <tr>
                                    <th>
                                        Người gửi
                                    </th>
                                    <th>
                                        Link
                                    </th>
                                </tr>
                                @foreach($respons as $respon)
                                <tr>
                                    <td>
                                        {{$respon->respondent->email}}
                                    </td>
                                    <td>
                                        <a href="/response/{{$respon->respondent->id}}">response/{{$respon->respondent->id}}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div id="mychart" style="margin-top: 2rem; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                            @foreach($topic->questions as $question)
                                @if ($question->question_type_id==0)
                                    <p>{{$question->content}}</p>
                                    <p style="margin-left: 1rem;">Không có thống kê cho câu hỏi dạng text</p>
                                @endif
                                @if ($question->question_type_id==1)
                                    @include('user/modules.chart', ['idcanvas'=>'cv1'.$question->id, 'type'=>'pie' , 'question' => $question])
                                @endif

                                @if ($question->question_type_id==2)
                                    @include('user/modules.chart', ['idcanvas'=>'cv1'.$question->id, 'type'=>'bar' , 'question' => $question])
                                @endif

                            @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
        <div id="footer" style="max-width: 680px; border: none; margin: 0 auto;">
            <div style="margin: 10px 10% 10px 10%; width: 80%; height: 1px; background-color: #AAAAAA "></div>
            <p style="font-size: 11px;">Không bao giờ gửi mật khẩu thông qua Google Biểu mẫu.</p>
            <i class="text-center" ><p>èm zèn tè lè mừn</p></i>
            <h3 class="text-center" >Survey by nhí nhố</h3>
        </div>
    </div>

    <div class="background">

    </div>
    
</main>
