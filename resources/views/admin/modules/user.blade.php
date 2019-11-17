
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Người dùng</h4>
        @if(Auth::user()->level==2||Auth::user()->level==5)
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createuser">Tạo người dùng mới</button>
        @endif
        <!-- create user dialog -->
        <div class="modal fade" id="createuser" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <form action="/admin/user/add" method="GET">
                <div class="modal-header">
                  <h4 class="modal-title">Tạo người dùng</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                        <input name="name" class="form-control" placeholder="Họ tên" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                        <input name="email" class="form-control" placeholder="Email" type="email">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                      <input name="phone" class="form-control" placeholder="Số điện thoại" type="text">
                    </div> 
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                        <input name="password" class="form-control" placeholder="Tạo mật khẩu" type="password">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                        <input name="passwordr" class="form-control" placeholder="Nhập lại mật khẩu" type="password">
                    </div> <!-- form-group// -->                                      
                    
                  </div>
                <div class="modal-footer">
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block"> Tạo tài khoản  </button>
                  </div> 
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--end create user dialog -->
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
                <!-- edit user dialog -->
                <div class="modal fade" id="edituser{{$user->id}}" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <form action="/admin/user/edit" method="GET">
                        <input type="text" name="id" hidden value="{{$user->id}}">
                      <div class="modal-header">
                  <h4 class="modal-title">Sửa người dùng</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                        <input name="name" class="form-control" placeholder="Họ tên" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                      <input name="phone" class="form-control" placeholder="Số điện thoại" type="text">
                    </div> 
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                        <input name="password" class="form-control" placeholder="Tạo mật khẩu" type="password">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                        <input name="passwordr" class="form-control" placeholder="Nhập lại mật khẩu" type="password">
                    </div> <!-- form-group// -->                                      
                    
                  </div>
                <div class="modal-footer">
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block"> Lưu lại  </button>
                  </div> 
                </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!--end edit user dialog -->
                <!-- delete user dialog -->
                <div class="modal fade" id="deleteuser{{$user->id}}" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <form action="/admin/user/delete" method="GET">
                        <div class="modal-header">
                          <h4 class="modal-title">Xóa người dùng</h4>
                        </div>
                        <div class="modal-body">
                          <p>Xóa tài khoản</p>
                          <p>{{$user->email}}</p>
                          <input type="text" name="id" hidden value="{{$user->id}}">
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-default" value="Xóa"></input>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!--end delete user dialog -->

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
                    <p style="margin-bottom: 0.4em;">Cấp quyền cho user</p>
                    <a href="user/up2/{{$user->id}}"><p class="btn btn-info">Thêm</p></a>
                    <a href="user/up3/{{$user->id}}"><p class="btn btn-info">Sửa</p></a>
                    <a href="user/up4/{{$user->id}}"><p class="btn btn-info">Xóa</p></a>
                  @else
                    <a href="user/down/{{$user->id}}"><p class="btn btn-info">Thu hồi quyền admin</p></a>
                  @endif
                  <p></p>
                @endif  
                @if(Auth::user()->level==3||Auth::user()->level==5)
                  <button type="button" class="btn" data-toggle="modal" data-target="#edituser{{$user->id}}">Sửa</button>
                @endif
                @if(Auth::user()->level==4||Auth::user()->level==5)
                  <button type="button" class="btn" data-toggle="modal" data-target="#deleteuser{{$user->id}}">Xóa</button>
                  
                @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <div>
             {{$users->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>