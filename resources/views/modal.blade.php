<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Note</button>-->

<div id="qwerty"  class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="cabecera"></h4>
      </div>
     <div style="padding: 2em;">
        <p id="parr1" style="text-align: justify;"> </p>
        <p id="parr2" style="text-align: justify;"> </p>
        <p id="parr3" style="text-align: justify;"> </p>
        <p id="parr4" style="text-align: justify;"> </p>

        <strong>Medication</strong>
        <p id="parr5" style="text-align: justify;"> </p>

     </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$( "#qwerty" ).click(function() {
  $("#qwerty").modal("hide");
});

</script>