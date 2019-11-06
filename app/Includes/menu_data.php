
/*Estructura de todas las opciones del sistema.. System option structure */
<?php 

$menuItem = [
  'Patient' => [['List','list_patient','&modelo=Patient&_method=get&findit=','list','*'],['New','edit_patient']],
  'History' => [['Medical History','history.LastMedicalHistory','&modelo=Lastmedical&_method=get&findit=','find'],
  				['Current Medication','history.CurrentMedication','&modelo=Currentmedication&_method=get&findit=','find'],
  				['Social History','history.SocialHistory','&modelo=Socialhistory&_method=get&findit=','find'],
  				['Family History','history.FamilyHistory','&modelo=Familyhistory&_method=get&findit=','find'],
  				['Surgical History','history.SurgicalHistory','&modelo=Surgicalhistory&_method=get&findit=','find'],
  				['Substance Use','history.SustanceUse','&modelo=Sustanceuse&_method=get&findit=','find'],
  				['Physical Examination','consultation.PhysicalExamination'],
  				['Physicians Note','www.monsrenas.com']			],
  'Admission' => ['consultation.Load','consultation'],        
  'Consultation' => ['consultation.Load','consultation'],
  'Notes' => [['Add Note','history.Edit_note'],['List','history.PhysiciansNote','&modelo=Physiciansnote&_method=get&findit=','flexlist','*'],'history.Load_list_note'],
  'Exams' => ['Lista de examenes por fecha','Detalles'],
  'Reports' => ['History','Service by dates','Exams'],
  'Appointment' => [['Listado','link'],['Nueva','Form']],
  
];


 ?>



