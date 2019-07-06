<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>show Information</title>
  </head>
  <body>


    <table>
      <tr>

        <th>#</th>
        <th>Title</th>
        <th>Image Link</th>
        <th>Image</th>
      </tr>
      <?php foreach ($images as $value): ?>

        <tr>
          <td>#</td>
          <td>{{$value->title}}</td>
          <td>{{$value->image}}</td>
          <td>

            <img src="{{ Storage::url($value->image)}}" alt="">

          </td>
        </tr>
      <?php endforeach; ?>
    </table>

  </body>
</html>
