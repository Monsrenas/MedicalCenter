<?php $identification=''; ?>
<?php use App\Familyhistory; 
if(!isset($_SESSION)){
    session_start();}
 $identification='';
?>

@if (isset($patient))
           <?php $identification=(isset($patient->identification))?$patient->identification:'';  
           ?>
@endif


@if (isset($_SESSION['identification']))
           <?php 
              $identification=($_SESSION['identification']);  
      ?>
@endif

<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; background: #AFC4E8; ">
<form  id="MySurgical" action="javascript:SaveDataNoRefreshView('MySurgical','store')" method="post" style="width: 100%; text-align: center;margin: 20px;">
	@csrf 	
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
	<input type="hidden" name="url"  value='history.SurgicalHistory'/>
	<input type="hidden" name="modelo"  value='Surgicalhistory'/>
  <input type="hidden" name="_method" value="post"/>

	<textarea rows = "5" cols = "100%" name = "surgical"><?php  echo  (isset($patient->surgical)?$patient->surgical:''); ?>
    </textarea >
	<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 36px;">
       	<button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-save"> Save</button>
    </div>
</form>
</dir>