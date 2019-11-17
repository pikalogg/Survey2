

<div style=" max-width: 640px; margin: 2rem auto;">
    <div class="col-md-12">
            <!-- Header -->
            <div class="card">
                <div style="width: 100%; height: 10px; background-color: rebeccapurple; border-radius: 5px 5px 0 0;">

                </div>
                <div class="card-header">
                    <h3 class="card-title">{{$respondent->topicResponse->topic->name}}</h3>
                    <p > {{$respondent->topicResponse->topic->description}} </p>
                </div>
            </div>
            @foreach($respondent->topicResponse->topic->questions as $question)
                @if($question->questionType->name === 'text')
                    <!-- cau hoi loai 1 -->
                    <div class="card">
                        <div class="card-header">
                            <p style="margin: 16px 0 0 0; font-size: 16px;">{{$question->content}}</p>
                        </div>
                        <div class="card-body">
                            <?php
                                $isAnswer = false;
                            ?>
                        @foreach($question->responses  as $response)
                            <input class="input-text" type="text" value="{{$response->answer}}" disabled>
                            <?php
                                $isAnswer = true;
                            ?>
                        @endforeach

                        @if(!$isAnswer)
                            <input class="input-text" type="text" value="Chưa được trả lời" disabled>
                        @endif
                        </div>
                    </div>
                @endif
                @if($question->questionType->name === 'multiple-choice')
                    <!-- cau hoi loai 2 -->
                    <div class="card">
                        <div class="card-header">
                            <p style="margin: 16px 0 0 0; font-size: 16px;">{{$question->content}}</p>
                        </div>
                        <div class="card-body">
                        @foreach($question->responseChoices as $choice)
                            <label for="{{$choice->id}}" class="radio">
                            @foreach($question->responses as $response)
                                @if($response->answer === $choice->content)
                                    <input type="radio" id="{{$choice->id}}" class="hidden" checked disabled/>
                                @endif
                            @endforeach
                                <span class="label"></span>{{$choice->content}}
                            </label> <br>
                        @endforeach
                        </div>
                    </div>
                @endif
                @if($question->questionType->name === 'checkboxes')
                    <!-- cau hoi loai 3 -->
                    <div class="card">
                        <div class="card-header">
                            <p style="margin: 16px 0 0 0; font-size: 16px;">{{$question->content}}</p>
                        </div>
                        <div class="card-body">
                        @foreach($question->responseChoices as $choice)
                            <?php
                                $checked = false;
                            ?>
                            @foreach($question->responses as $response)
                                @if($response->answer === $choice->content)
                                    <label for="{{$choice->id}}" class="checkbox">
                                        <input type="checkbox" id="{{$choice->id}}" class="hidden" checked disabled/>
                                        <span class="label"></span>{{$choice->content}}
                                    </label> <br>
                                    <?php
                                        $checked = true;
                                    ?>
                                    @break
                                @endif
                            @endforeach
                            @if($checked)
                                @continue
                            @endif
                            <label for="{{$choice->id}}" class="checkbox">
                                <span class="label"></span>{{$choice->content}}
                            </label> <br>
                        @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
            
            <div class="card">
                <div class="card-header">
                    <p style="margin: 16px 0 0 0; font-size: 16px; color: blue;">Email hoặc họ tên</p>
                </div>
                <div class="card-body">
                    <input class="input-text" name="lh" type="text" placeholder="" value="{{$respondent->email}}" disabled>
                </div>
            </div>
        <footer>
        <div style="margin: 10px 10% 10px 10%; width: 80%; height: 1px; background-color: #AAAAAA "></div>
            <p style="font-size: 11px;">Không bao giờ gửi mật khẩu thông qua Google Biểu mẫu.</p>
            <i class="text-center" ><p>èm zèn tè lè mừn</p></i>
            <h3 class="text-center" >Survey by nhí nhố</h3>
        </footer>
    </div>
</div>