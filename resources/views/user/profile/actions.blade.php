<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal">
    <span class="small mx-4">Edit avatar</span>
  </button>

  <!-- Modal -->
  <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title" id="exampleModalLabel">Update Avatar</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('profile.update.picture')}}" method="post" enctype="multipart/form-data">
                @csrf
               <div class="jumbotron">
           <div class="row">
            <div class="mx-auto">
                <img class="avatar" id="avatar"/>
            </div>

           </div>


       </div>
         <div class="card-footer bg-secondary">

              <div class="row" id="hide-footer">
               <div class="mx-auto">
                <div class="row">
                    <div class="col">



                            <div class="upload-btn-wrapper">
                                <button class="btn btn-sm btn-secondary w-100"><span class="mx-3">upload </span></button>
                                <input type="file" name="avatar"   onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0])" onclick="showElem()"  required>
                            </div>
<div>{{$errors->first('avatar')}}</div>


                </div>
                  <div class="col">   <button class="btn btn-secondary btn-sm"><span class="mx-2 small">

                       <a href="{{route('profile.avatar.remove')}}" class=" text-white" style="text-decoration: none">Remove</a>
                </span></button></div>
                 </div>
               </div>
              </div>

        <div class="row pt-2" id="hide">
            <div class="mx-auto">
                <button class="btn btn-primary btn-sm" type="submit"><span class="mx-4 small">save</span></button>
            </div>
        </div>
        </div>
            </form>

        </div>

      </div>
    </div>
  </div>
  <script>

document.getElementById('hide').style.visibility ="hidden"

         function showElem() {
            document.getElementById("hide-footer").style.visibility = "hidden";
  document.getElementById("hide").style.visibility = "visible";

}
  </script>
