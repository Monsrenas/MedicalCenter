<!DOCTYPE html>
<br>
<style type="text/css">
  .panel {
    margin-bottom: 2px;
    
  } 

  .panel-body { max-height: 440px; 
                overflow: auto scroll; 
                background: #7190C6;
             -webkit-box-shadow: inset 0px 0px 14px 0px rgba(32,73,144,1);
-moz-box-shadow: inset 0px 0px 14px 0px rgba(32,73,144,1);
box-shadow: inset 0px 0px 14px 0px rgba(32,73,144,1);} 
.collapsed {
  outline: none;

}

.barra {
    background: #768AC2;

}
</style>

<div class="container-fluid">
 <div id="consultationHeader">
   <span class="consultationHeader">Consultation: </span><span id="fechaconsult"></span>
 </div>   
<div id="faq" role="tablist" aria-multiselectable="true">

<div class="panel panel-default">
<div class="panel-heading" role="tab" id="questionThree" style="background:#3149D5; color: white;">
<h5 class="panel-title">
<a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerThree" aria-expanded="false" aria-controls="answerThree">
    <div class="">Interrogation</div> 
</a>
</h5>
</div>
<div id="answerThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="questionThree">
<div class="panel-body" id="Interrogation">
  Empty...
</div>
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading" role="tab" id="questionOne" style="background:#3149D5; color: white;">
<h5 class="panel-title">
<a data-toggle="collapse" data-parent="#faq" href="#answerOne" aria-expanded="true" aria-controls="answerOne">
    <div>Physical exam</div>
</a>
</h5>
</div>
<div id="answerOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionOne">
<div class="panel-body" id="Physical">
  <?php echo VIEW::make("consultation.PhysicalExamination") ?>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" role="tab" id="questionTwo" style="background:#3149D5; color: white;">
<h5 class="panel-title">
<a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerTwo" aria-expanded="false" aria-controls="answerTwo" target='_blank'>
        <div>Laboratory exams</div> 
</a>
</h5>
</div>
<div id="answerTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
<div class="panel-body" id="Laboratory"> 
  Empty...
</div>
</div>
</div>

</div>
</div>
    
<!-- Initialize Bootstrap functionality -->
<script>
// Initialize tooltip component
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Initialize popover component
$(function () {
  $('[data-toggle="popover"]').popover()
})

  /*PreLoadDataInView('#Interrogation', '&modelo=Interrogation&url=consultation.interrogation', 'flexlist');*/
</script>