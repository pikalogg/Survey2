
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Thông báo</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" style="width: 100%;">
            <thead class=" text-primary">
              <th>
                Thời gian
              </th>
              <th>
                Nội dung
              </th>
            </thead>
            <tbody>
              @foreach($notifis as $notifi)
                @if($notifi->status==0)
                <tr style="background-color:#DDDDDD">
                  <td style="width: 20%;">
                    {{$notifi->created_at}}
                  </td>
                  <td style="width: 80%;">
                      {{$notifi->content}}
                  </td>
                </tr>
                @else
                <tr>
                  <td style="width: 20%;">
                    {{$notifi->created_at}}
                  </td>
                  <td style="width: 80%;">
                      {{$notifi->content}}
                  </td>
                </tr>
                @endif
              @endforeach
            </tbody>
          </table>
          <div>
            {{$notifis->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>