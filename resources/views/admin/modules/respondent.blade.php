
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
                Email
              </th>
              <th style="width: 25%;">
                Tên biểu mẫu
              </th>
              <th style="width: 25%;">
                link
              </th>
            </thead>
            <tbody>
            @foreach($respons as $respon)
              <tr>
                <td>
                  {{$respon->name}}
                </td>
                <td>
                  {{$respon->email}}
                </td>
                <td>
                    {{$respon->name}}
                </td>
                <td>
                    <a href="{{$respon->link}}">{{$respon->link}}</a>
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