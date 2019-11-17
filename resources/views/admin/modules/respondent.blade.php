
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
              <th style="width: 25%;">
                Người gửi
              </th>
              <th style="width: 25%;">
                Tên biểu mẫu
              </th>
              <th style="width: 25%;">
                link
              </th>
              <th style="width: 25%;">
                Thời gian gửi
              </th>
            </thead>
            <tbody>
            @foreach($respons as $respon)
              <tr>
                <td>
                  {{$respon->respondent->email}}
                </td>
                <td>
                  {{$respon->topic->name}}
                </td>
                <td>
                  <a href="http://localhost:8000/response/{{$respon->respondent->id}}">http://localhost:8000/response/{{$respon->respondent->id}}</a>
                </td>
                <td>
                    {{$respon->created_at}}
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

          <div>
             {{$respons->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>