

<?php 

$menuItem = [
  'Patient' => [['List','list_patient','&modelo=Patient&_method=get&findit=','list'],['New','edit_patient']],
  'History' => [['Last medical History','history.LastMedicalHistory','&modelo=Lastmedical&_method=get&findit=','find'],
  				['Current Medication','welcome'],
  				['Social History','welcome'],
  				['Family History','welcome'],
  				['Surgical History','welcome'],
  				['Substance Use','welcome'],
  				['Physical Examination','consultation.PhysicalExamination'],
  				['Physicians Note','www.monsrenas.com']			],
  'Consultation' => ['consultation.list','consultation'],
  'Notes' => ['','Notas medicas por especialidades'],
  'Exams' => ['Lista de examenes por fecha','Detalles'],
  'Reports' => ['History','Service by dates','Exams'],
  'Appointment' => [['Listado','link'],['Nueva','Form']],
  
];


 ?>



