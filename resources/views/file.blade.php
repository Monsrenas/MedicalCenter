<form action="{{url('upload')}}" method="post">
	@csrf
	<input type="file" name="photo">
	 <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 12px;">
        <button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-save"> Save</button>
        <br>
    </div>
</form>