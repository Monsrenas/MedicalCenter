<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Note</button>-->

<div id="qwerty"  class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="cabecera"></h4>
      </div>
     <div style="padding: 2em; max-height: 700px; overflow: hidden;">
        <p id="parr1" style="text-align: justify; max-height: 600px; overflow: auto scroll;"> </p>
        <p id="parr2" style="text-align: justify; overflow: auto scroll;"> </p>
        <p id="parr3" style="text-align: justify; overflow: auto scroll;"> </p>
        <p id="parr4" style="text-align: justify; overflow: auto scroll;"> </p>
        <p id="parr5" style="text-align: justify; overflow: auto scroll;"> </p>

     </div>
    </div>
  </div>
</div>


<div id="thingshow"  class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
 
     <div style="padding: 2em; max-height: 700px; overflow: hidden;">
        <p id="pa1" style="text-align: justify; max-height: 600px; overflow: auto scroll;"> </p>
        <p id="pa2" style="text-align: justify; overflow: auto scroll;"> </p>
     </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function clearModal(){ 
    for (var i = 1; i < 6; i++) {
      $('#parr'+i).html('');
    }

  }

/*$( "#qwerty" ).click(function() {
  $("#qwerty").modal("hide");
});*/
$( "#qwerty" ).hide(function() {
      $('#parr1').html(''); $('#parr2').html(''); $('#parr3').html(''); $('#parr4').html(''); $('#parr5').html('');
    
});
</script>