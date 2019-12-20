<form method="POST" action="{{route('subir')}}" accept-charset="UTF-8" enctype="multipart/form-data">
  {{ csrf_field() }}

  <label for="archivo"><b>Archivo: </b></label><br>
  <input type="file" name="archivo[]" required>
  <input type="file" name="archivo[]" required>
  <input class="btn btn-success" type="submit" value="Enviar" >
</form>