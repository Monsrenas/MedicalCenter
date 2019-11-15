<?php  
  
   function specialityName($key)
   {
        $speciality=[ 'Allergology',
                'Anaesthetics',
                'Cardiology',
                'Clinical biology',
                'Clinical chemistry',
                'Dermatology',
                'Endocrinology',
                'Gastroenterology',
                'Geriatrics',
                'Hematology',
                'Immunology',
                'Infectious diseases',
                'Internal medicine',
                'Laboratory medicine',
                'Microbiology',
                'Nephrology',
                'Neuropsychiatry',
                'Neurology',
                'Neurosurgery',
                'Obstetrics and gynaecology',
                'Ophthalmology',
                'Orthopaedics',
                'Otorhinolaryngology',
                'Paediatrics',
                'Pathology',
                'Pharmacology',
                'Physical medicine and rehabilitation',
                'Psychiatry',
                'Radiology',
                'Respiratory medicine',
                'Rheumatology',
                'Stomatology',
                'Urology',
                'Venereology'];
      return ($key=='') ? $speciality : $speciality[$key];          
   }             

  function IsThisOp($elm, $real)
  { 
    return (($elm==$real) ? "selected":"");
  }
                               
 function OptionSpecialitySelect($userdata)
    {           
                $speciality=specialityName('');
                $spSelect="";
                $i=1;
                $rl=((isset($userdata->speciality)) ? $userdata->speciality:""); 
                $NoC=(IsThisOp('0', $rl));
                $NoN=(IsThisOp('N', $rl));
                $spSelect=$spSelect."<option value='0' ".$NoC." >none</option>";
                $spSelect=$spSelect."<option value='N' ".$NoN." >Nurse</option>";
                
                foreach ($speciality as $spclt) {
                   $spSelect=$spSelect." <option value='".$i."' ".IsThisOp($i, $rl)." >".$spclt."</option> "; 
                    $i++;
                }
                return $spSelect;
    }
?>
       