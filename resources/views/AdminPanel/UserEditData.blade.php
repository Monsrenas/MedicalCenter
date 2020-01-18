

<?php use App\Login; ?>

 @if (isset($userdata))
           <?php $useredit=$userdata->useredit;  
                  $password=$userdata->password;
                  if ($password=='') { $password='12345'; }

           ?>
 @else         
           <?php                     
            $userdata=new Login; 
            $password='12345';
           ?>
@endif

@include ('speciality')

<?php $rl=((isset($userdata->speciality)) ? $userdata->speciality:""); ?>
<style type="text/css">
  .izquierda {
                text-align:left;
            }
  .derecha  {
                text-align:right;
            }
  .fila { width: 100%; height: 40px;
          
        }
  .columna { width: 50%; 
          float: left;
          padding-left: 5px; 
          height: 32px;
        }

</style>

<div class="fila" style="margin-top: 30px;">
      <div class="columna derecha">
        <label>User:</label>
     </div>
     <div class="columna izquierda">   
       {{ $userdata->user }}
     </div>
</div>



<form id="EditUser" action="javascript:SaveDataNoRefreshView('EditUser','saveuser')" method="post" style="width: 100%;">
  @csrf   
  
  <input type="hidden" name="user" placeholder="User" value='{{ $userdata->user }}'>

  <div class="fila">
      <div class="columna derecha">     
        <strong>Acces level:</strong>
      </div>
      <div class="columna izquierda">
        <select name="acceslevel" id="acceslevel" required disabled>
           <option value="0">Basic assistant</option>
            <option value="1">Advanced assistant</option>
            <option value="2">General physician</option>
            <option value="3">Medical specialist</option>
            <option value="4">Team leader</option>
            <option value="5">Administrator</option>
            <option value="6">Principal Administrator</option>
        </select>
         <script type="text/javascript"> var acceslvl="<?php  echo  $userdata->acceslevel; ?>"; </script>
      </div>
  </div>

   <div class="fila"> 
       <div class="columna derecha"><strong>Medical speciality:</strong></div>
       <div class="columna izquierda"> 
                                    <select name="speciality" id="speciality" required>
                                       <?php  echo OptionSpecialitySelect($userdata); ?>
                                    </select>
      </div>
  </div>
   <input type="hidden" name="password" placeholder="User" value='{{ $password }}'>
  <br>
  
  <div class="fila">
      <div class="columna derecha">
         <label>Name:</label> 
      </div>
      <div class="columna izquierda">
        <input type="text" name="name"  value='{{ $userdata->name }}' required>
      </div>
  </div>

  <div class="fila">
      <div class="columna derecha">  
          <label>Surname:</label>
      </div>

      <div class="columna izquierda">
          <input type="text" name="surname"  value='{{ $userdata->surname }}' required>
      </div>
  </div>

  <div class="fila">
      <div class="columna derecha">
        <label>Identification:</label>  
      </div>

      <div class="columna izquierda">
        <input type="text" name="identification" value='{{$userdata->identification}}' required>
      </div>
  </div>
  <br><br>

  <div class="fila">
      <div class="columna derecha">
        <label>Email:</label>
      </div>

      <div class="columna izquierda">
          <input type="email" name="email"  value='{{ $userdata->email }}' required>
      </div>
  </div>

  <div class="fila">
     <div class="columna derecha"> 
        <label>Phone:</label> 
    </div>

    <div class="columna izquierda">
        <input type="text" name="phone"  value='{{ $userdata->phone }}' required><br><br>
    </div>
  </div>
<br> 
  <div class="fila" style="text-align: center;  margin-bottom: 20px;">
    <div class="fila">
      <label>Description:</label>
    </div>
      <textarea  style="width: 60%; margin: 1px;" name = "description" required>{{ $userdata->description }}</textarea >
  </div>
 
  <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 50px;">
        <button type="save" class="btn btn-primary" style="margin-right: 100px;">Save</button>
        <?php if ($password<>'12345'){ echo "<input type='checkbox' name='rstpass' >   Reset password ";} ?>
    </div>

 
</form>
<script type="text/javascript">
  
        function iniSelect(elm, vlr){  document.getElementById(elm).value=vlr;}
        iniSelect("acceslevel",acceslvl);
</script>