
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
              <th style="width: 20%;">
                Tiêu đề
              </th>
              <th style="width: 20%;">
                Link
              </th>
              <th style="width: 30%;">
                Miêu tả
              </th>
              <th style="width: 15%;">
                Mở vào
              </th>
              <th style="width: 15%;">
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
                    <a style="color: blue;" href="http://localhost:8000/form/{{$topic->link}}">http://localhost:8000/form/{{$topic->link}}</a>
                </td>
                <td>
                  {{$topic->description}}
                </td>
                <td>
                    {{$topic->opening_time}}
                </td>
                <td >
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