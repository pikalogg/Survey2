
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Người dùng</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" style="width: 100%;">
            <thead class=" text-primary">
              <th>
                Tiêu đề
              </th>
              <th>
                Link
              </th>
              <th>
                Miêu tả
              </th>
              <th>
                Mở vào
              </th>
              <th>
                Đóng vào
              </th>
            </thead>
            <tbody>
            @foreach($topics as $topic)
              <tr>
                <td>
                  {{$topic->name}}
                </td>
                <td>
                    <?php
                        $link = substr($topic->link,0, 20) . "...";
                    ?>
                    <a class="link" style="color: blue;" href="/form/{{$topic->link}}">{{$link}}</a>
                </td>
                <td>
                  {{$topic->description}}
                </td>
                <td>
                    {{$topic->opening_time}}
                </td>
                <td>
                    {{$topic->closing_time}}
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

          <div>
             {{$topics->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>