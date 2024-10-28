<div>
    <div class="card">
        <form action="" method="post">
          
          
           
            <textarea  id="myeditor" wire:model='' >
             {{-- {{$arts->art??""}} --}}
            </textarea>   
            <input type="hidden" name="id" value="" id="">
            <button type="submit" class="btn btn-primary">حفظ</button>
            
            <script src="ck24/ckeditor/ckeditor.js"></script>
            <script>
              window.onload = function() {
                  CKEDITOR.replace('myeditor');
              };
          </script>
        </form>
    </div>
</div>
