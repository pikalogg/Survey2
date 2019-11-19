<div style="max-width: 790px; margin: auto;" id="content">
    

    <h3 style="margin: 30px 0 10px 0;">Biểu mẫu của bạn</h3>
    <div style="background: white; display: flex;">
        <a href="{{ route('createtopic') }}"><img style="vertical-align: unset ; margin: 6.2px; height: 270px ; width: 188px ; border-radius: 15px; border-width: 2px;
    border-style: inset;
    border-color: initial;
    border-image: initial;" src = "img/create.jpg"></img></a>
        
        @foreach($topics as $topic)
            <div style="margin: 6.2px; max-height: 270px ; max-width: 23% ; border-radius: 15px;">
                <a href="/topic/{{$topic->link}}"><div style="width: 188px; height: 270px; position: absolute;"></div></a>
                <iframe  class="myiframe" style="height: 270px; overflow:scroll; width: 188px; border-radius: 15px;" scrolling="no" src="/form/{{$topic->link}}">

                </iframe>
            </div>
        @endforeach

        <div style="position: absolute; left: 36%; bottom: 20%;">
            {{$topics->links()}}
        </div>
    </div>
</div>

