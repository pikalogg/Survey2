<main>
    <div id="header">
        <div class="container-fluid">
            <a href="" class="btn-header btn-back" ><i class="fas fa-long-arrow-alt-left"></i></a>
            <a href="" class="btn-header btn-share"><i class="fas fa-share-alt"></i></a>
            <a href="" class="btn-header btn-setting"><i class="fas fa-cog"></i></a>
        </div>
    </div>
    <div class="content">
        <div class="tab">

            <div class="description">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="question-tab" data-toggle="tab" href="#question" role="tab" aria-controls="question" aria-selected="true">Question</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Answer-tab" data-toggle="tab" href="#Answer" role="tab" aria-controls="Answer" aria-selected="false">Answer</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="question" role="tabpanel" aria-labelledby="question-tab">
                        <form id="create-form" action="{{url('/')}}" method="POST">
                            {{ csrf_field() }}
                            <div id="listquestion">
                                <div class="one_zone title_zone" >
                                    <input id="title_input" type="text" name="" value="" placeholder="Title">
                                    <br>
                                    <textarea id="description_input" rows="1" type="textarea" name="" value="Description" placeholder="Description"></textarea>
                                    
                                </div>

                                
                            </div>
                            
                            <div style="margin: 10px 10% 10px 10%; width: 80%; height: 1px; background-color: #AAAAAA "></div>
                            <input style="width: 20%; margin: 0 40% 10px;" class="btn btn-success" type="submit" value="Lưu Form">
                        </form>
                    </div>
                    
                    <div class="tab-pane fade" id="Answer" role="tabpanel" aria-labelledby="Answer-tab">
                        <p>bọn lol 1</p>
                        <p>bọn lol 1</p>
                        <p>bọn lol 1</p>
                        <p>bọn lol 1</p>
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
