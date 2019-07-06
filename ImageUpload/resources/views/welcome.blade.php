<!DOCTYPE html>
<html>
    <body>

                <form class="form-control" action="{{route('store')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <label for="title">Title</label>
                  <input type="text" name="title" value="">
                  <br><br><br>
                  <label for="image">Insert Image</label>
                  <input type="file" name="image" value="">
                    <br><br><br>
                  <input type="submit" name="" value="Upload Image">
                </form>


    </body>
</html>
