<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Người dùng</h4>
        
        <a style="margin-right: 10px;" href="">Tạo người dùng mới</a>
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
                @if($user->level==1)
                  <a href="">Cấp quyền admin</a>
                @elseif($user->id == Auth::user()->id)

                @else
                  <a href="">Thu hồi quyền admin</a>
                @endif
                  <p></p>
                  <a href="">Sửa</a>
                  <a style="margin-left: 10px;" href="/admin/user/delete/{{$user->id}}">Xóa</a>
                    
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>