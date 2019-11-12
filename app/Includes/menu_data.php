
/*Estructura de todas las opciones del sistema.. System option structure */
<?php 
 function DocID(){ 
    if(!isset($_SESSION)){ session_start();}
    $identification=(isset($_SESSION['identification']))?$_SESSION['dr_user'] : "";
    $user=(isset($_SESSION['dr_user']))?$_SESSION['dr_user'] : "";
    $cdate=date("Y-m-d");  $hoy=str_replace("-", "", $cdate);
    $id=str_replace(" ", "",$hoy.$identification.$user);
    return $id;
    }

    
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
  'Admission' => [['Admission','admission']],        
  'Consultation' => ['consultation.Load','consultation'],
  'Notes' => ['history.Load_list_note',['Add Note','history.Edit_note'],['List','history.PhysiciansNote','&modelo=Physiciansnote&_method=get&findit=','flexlist','*']],
  'Exams' => ['Lista de examenes por fecha','Detalles'],
  'Reports' => ['History','Service by dates','Exams'],
  'Appointment' => [['Listado','link'],['Nueva','Form']],
  
];


 ?>



