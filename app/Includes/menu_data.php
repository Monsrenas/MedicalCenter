
<!-- Estructura de todas las opciones del sistema.. System option structure -->
<?php 
 function DocID(){ 
    if(!isset($_SESSION)){ session_start();}
    $identification=(isset($_SESSION['identification']))?$_SESSION['dr_user'] : "";
    $user=(isset($_SESSION['dr_user']))?$_SESSION['dr_user'] : "";
    $cdate=date("Y-m-d");  $hoy=str_replace("-", "", $cdate);
    $id=str_replace(" ", "",$hoy.$identification.$user);
    return $id;
    }

    
$patientITEMS = [
  'Patient' => ['patient',['List','list_patient'],['New','edit_patient']],
  'History' => [['Physicians Note','history.Load_ALL_note'],['Physical Examination','history.Load_PhysicalExamination_list'],['Medical History','history.LastMedicalHistory','&modelo=Lastmedical&_method=get&findit=','find'],
  				['Current Medication','history.CurrentMedication','&modelo=Currentmedication&_method=get&findit=','find'],
  				['Social History','history.SocialHistory','&modelo=Socialhistory&_method=get&findit=','find'],
  				['Family History','history.FamilyHistory','&modelo=Familyhistory&_method=get&findit=','find'],
  				['Surgical History','history.SurgicalHistory','&modelo=Surgicalhistory&_method=get&findit=','find'],
  				['Substance Use','history.SustanceUse','&modelo=Sustanceuse&_method=get&findit=','find'],],        
  'Consultation' => ['consultation.Load','consultation'],
  'Notes' => ['history.Load_list_note',['Add Note','history.Edit_note'],['List','history.PhysiciansNote','&modelo=Physiciansnote&_method=get&findit=','flexlist','*']],
  'Admission' => ['Admission.load',['Admission','Admission.admission'],['Medical release','Admission.discharge']],
  'Exams' => ['exams.load_list',['Performed','xmsrealizados'],['Requested','xmssolicitados']],
  'Appointment' => ['appointment.done',['Make appointment','appointment.find']],
  'Reports' => [['Summary of services','report.searche']],
  
];

$userITEMS = [
  'Users' => [['List','AdminPanel.list_User','&modelo=medUser&_method=get&findit=','list','*'],['New','AdminPanel.editUser']] ];

 ?>


<!--
    para que el listado de paciente salga automatico

 ,'&modelo=Patient&_method=get&findit=','list','*' -->
