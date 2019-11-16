

<div style=" max-width: 640px; margin: 2rem auto;">
    <div class="col-md-12">
        <form action="" method="POST">
            <!-- Header -->
            <div class="card">
                <div style="width: 100%; height: 10px; background-color: rebeccapurple; border-radius: 5px 5px 0 0;">

                </div>
                <div class="card-header">
                    <h3 class="card-title">{{$topic->name}}</h3>
                    <p > {{$topic->description}} </p>
                </div>
            </div>
            {{ csrf_field() }}
            @foreach($topic->questions as $question)
                @if($question->questionType->name === 'text')
                    <!-- cau hoi loai 1 -->
                    <div class="card">
                        <div class="card-header">
                            <p style="margin: 16px 0 0 0; font-size: 16px;">{{$question->content}}</p>
                        </div>
                        <div class="card-body">
                            <input class="input-text" name="{{$question->id}}" type="text" placeholder="Câu trả lời của bạn">
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
                                <input type="radio" name="{{$question->id}}" id="{{$choice->id}}" class="hidden" value="{{$choice->content}}"/>
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
                            <label for="{{$choice->id}}" class="checkbox">
                                <input type="checkbox" name="{{$question->id}}as{{$choice->id}}" id="{{$choice->id}}" class="hidden" value="{{$choice->content}}"/>
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
                    <p style="margin: 0; font-size: 12px;">Không bắt buộc</p>
                </div>
                <div class="card-body">
                    <input class="input-text" name="lh" type="text" placeholder="Email của bạn" value="">
                </div>
            </div>
            <input style="background-color: #0033CC;" class="btn btn-primary" type="submit" value="Gửi">
        </form>     
        <footer>
        <div style="margin: 10px 10% 10px 10%; width: 80%; height: 1px; background-color: #AAAAAA "></div>
            <p style="font-size: 11px;">Không bao giờ gửi mật khẩu thông qua Google Biểu mẫu.</p>
            <i class="text-center" ><p>èm zèn tè lè mừn</p></i>
            <h3 class="text-center" >Survey by nhí nhố</h3>
        </footer>
    </div>
</div>