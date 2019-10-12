<!DOCTYPE html>
<br>
<div class="container-fluid">
    
<div id="faq" role="tablist" aria-multiselectable="true">

<div class="panel panel-default">
<div class="panel-heading" role="tab" id="questionOne">
<h5 class="panel-title">
<a data-toggle="collapse" data-parent="#faq" href="#answerOne" aria-expanded="false" aria-controls="answerOne">
    <div>Interrogation</div>
</a>
</h5>
</div>
<div id="answerOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionOne">
<div class="panel-body">
Answer 1...
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" role="tab" id="questionTwo">
<h5 class="panel-title">
<a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerTwo" aria-expanded="false" aria-controls="answerTwo">
        <div>Physical exam</div> 
</a>
</h5>
</div>
<div id="answerTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
<div class="panel-body">
Answer 2...
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" role="tab" id="questionThree">
<h5 class="panel-title">
<a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerThree" aria-expanded="false" aria-controls="answerThree">
    <div> Laboratory exams</div> 
</a>
</h5>
</div>
<div id="answerThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="questionThree">
<div class="panel-body">
  <?php echo (View::make('show_patient')); ?>
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
</script>