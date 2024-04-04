
<body>
  @section ('contain')
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#save1"> اضافة مستخدم جديده </button>
         
          <div class="card mb-4">
         
            <div class="card-header pb-0">
           
              <h6>المستخدمــيــــــن</h6>
             
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="S_table">
                  <thead>
                    <tr>
                        <th class="text-center text-uppercase text-primary text-md font-weight-bolder"> ID </th>
                      <th class="text-center text-uppercase text-primary text-md font-weight-bolder"> اسم المستخدم</th>
                      <th class="text-center text-uppercase text-primary text-md font-weight-bolder"> لجوال</th>
                      <th class="text-center text-uppercase text-primary text-md font-weight-bolder"> البريد الالكتروني</th>
                      <th class="text-center text-uppercase text-primary text-md font-weight-bolder"> كلمة السر</th>
                   
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($user as $item)
                    <tr id="Aid{{$item->id}}">
                        <td>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$item->id}}</h6>
                        </div>
  
                       
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="users_image/{{$item->image}}" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                          </div>
                         
                        </div>
                      </td> 
                      <td>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$item->phone}}</h6>
                        </div>
  
                       
                      </td>
                      <td>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$item->email}}</h6>
                        </div>
  
                       
                      </td>
                      <td>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm fa fa-lock text-primary" >كلمة السر مشفرة لظمان الحماية</h6>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"></span>
                      </td>
                      <td class="align-middle">
                    
                      <form action="{{route('Stop_user')}}" method="POST">
                        {{-- {{ route('deleteCollage',$item->id) }} --}}
                       @csrf
                       <input type="hidden" name="id_user" value="{{$item->id}}">
                    
                      @if($item->runstute==1)
                      <button type="submit" name="delete"  class="mb-0 text-md btn btn-danger">تعطيل</button>
                      @else
                      <button type="submit" name="delete"  class="mb-0 text-md btn btn-success">تفعيل</button>
                      @endif
                      </form>
                     <br>
                     <button type="button" name="edite"  class="mb-0 text-md btn btn-info">تعديل</button>
  
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
  
  
      <div class="modal fade" id="save1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> المستخدمــيــــــن </h5>
        <button type="button" class="close text-danger" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  id ="addccollage" action="{{route('Store_user')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name" class="col-form-label1">اسم المستخدم</label>
             <input  class="form-control "  name="name" required>
            
          </div>
  
          <div class="form-group">
              <label for="name" class="col-form-label1">جوال</label>
               <input  class="form-control "  name="Phone" required>
              
            </div>
  
            <div class="form-group">
              <label for="name" class="col-form-label1">البريد الالكتروني</label>
               <input  class="form-control " type="email"  name="email" required>
              
            </div>
  
            <div class="form-group">
              <label for="name" class="col-form-label1">كلمة السر </label>
               <input  class="form-control " type="password"  name="password" required>
              
            </div>
          <div class="form-group">
            <label for="name1" class="col-form-label">صورة</label>
            <input type="file" name="image" id="input_image_id" onclick="show_image()" class="form-control" required>
          </div>
          <img id="image_id"  width="100%" height="200" src="#" alt="Image Preview">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
        <input type="submit" class="btn btn-primary" value="حفظ">
      </div>
      </form>
    </div>
  </div>
  </div>
  
  <!-- =================Edit modal======================= -->
  
  
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">الكليات </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  id ="Editcollage">
          @csrf
          <input type="hidden" id="id" name="id"/>
          <div class="form-group">
            <label for="name1" class="col-form-label">اسم الكلية</label>
            <input  class="form-control" id="name1" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
        <input type="submit" class="btn btn-primary" value="حفظ">
      </div>
      </form>
    </div>
  </div>
  </div>
  
  
  
  
  <script>
  // input_image_id
  // image_id
  document.addEventListener("change", function(event) {
  if (event.target && event.target.matches("#input_image_id")) {
    var file = event.target.files[0];
    var reader = new FileReader();
  
    reader.onload = function(e) {
      document.getElementById("image_id").setAttribute("src", e.target.result);
    };
  
    reader.readAsDataURL(file);
  }
  });
  </script> 
  @endsection
  </body>
  