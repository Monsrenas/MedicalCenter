<!DOCTYPE html>
<br>
<style type="text/css">
  .panel {
    margin-bottom: 2px;
    
  } 

  .panel-body { max-height: 440%;
                height: 440%; 
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
.iinfor {font-size: small;
          color: #ADC5E8;
          width: 25%;
         float: left;
         text-align: left;
        }
.IntHead {font-size: large;
          width: 40%;
         float: left;}
.ilabel{ text-align: left;
          align: left;
          width: 5%;
         float: left;
         }

.noemty {  float: left;
           padding-right: 20px; 
        }         
</style>

<div class="container-fluid">
<div id="faq" role="tablist" aria-multiselectable="true">

<div class="panel panel-default">
<div class="panel-heading" role="tab" id="questionThree" style="background:#3149D5; color: white; height: 40px;">
<h5 class="panel-title">
<a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerThree" aria-expanded="false" aria-controls="answerThree">
    <div>
      <div class="ilabel" style="text-align: left;">Date: </div>
      <div id="InDate" class="iinfor">.</div>
      <div class="IntHead">INTERROGATION</div>
      <div class="iinfor" id="InPatien"></div>
    </div> 
</a>
</h5>
</div>
<div id="answerThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="questionThree">
<div class="panel-body" id="Interrogation">

</div>
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading" role="tab" id="questionOne" style="background:#3149D5; color: white;">
<h5 class="panel-title">
<a data-toggle="collapse" data-parent="#faq" href="#answerOne" aria-expanded="true" aria-controls="answerOne">
    <div>PHYSICAL EXAM</div>
</a>
</h5>
</div>
<div id="answerOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionOne">
<div class="panel-body" id="Physical">
  
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" role="tab" id="questionTwo" style="background:#3149D5; color: white;">
<h5 class="panel-title">
<a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerTwo" aria-expanded="false" aria-controls="answerTwo" target='_blank'>
        <div>LABORATORY EXAMS</div> 
</a>
</h5>
</div>
<div id="answerTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
<div class="panel-body" id="Laboratory"> 
  
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

  $('.panel-body').css("height", screen.height-510);
  $('.panel-body').css("max-height", screen.height-510);                          

  /*PreLoadDataInView('#Interrogation', '&modelo=Interrogation&url=consultation.interrogation', 'flexlist');
   echo VIEW::make("consultation.PhysicalExamination")*/
</script>