<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Người dùng</h4>
        @if(Auth::user()->level==2||Auth::user()->level==5)
          <a style="margin-right: 10px;" href="">Tạo người dùng mới</a>
        @endif
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>
                Tên
              </th>
              <th>
                Email
              </th>
              <th>
                Điện Thoại
              </th>
              <th class="text-right">
                Chức năng
              </th>
            </thead>
            <tbody>
              @foreach($users as $user)
              @if($user->level < Auth::user()->level)
              <tr>
                <td>
                  {{$user->name}}
                </td>
                <td>
                  {{$user->email}}
                </td>
                <td>
                  {{$user->phone}}
                </td>
                <td class="text-right">
                @if(Auth::user()->level==2)
                  <p>NULL</p>
                @endif
                @if(Auth::user()->level==5)
                  @if($user->level==1)
                    <p style="margin-bottom: 0.4em;">Cấp quyền</p>
                    <a href="">Thêm</a>
                    <a href="">Sửa</a>
                    <a href="">Xóa</a>
                  @else
                    <a href="">Thu hồi quyền admin</a>
                  @endif
                  <p></p>
                @endif  
                @if(Auth::user()->level==3||Auth::user()->level==5)
                  <a href="">Sửa</a>
                @endif
                @if(Auth::user()->level==4||Auth::user()->level==5)
                  <a href="">Xóa</a>
                @endif
                </td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>