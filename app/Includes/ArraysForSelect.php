<?php
$maritalStts=[ "S"=>"Single",
               "M"=>"Married",
               "D"=>"Divorced",
               "W"=>"Widowed"];

$Relationship=[	"SP"=>"Spouse",
	            "PR"=>"Parents",
	            "SB"=>"Siblings",
	            "CH"=>"Children",
	            "GC"=>"Grandchildren",
	            "GP"=>"Grandparents",
	            "NN"=>"Nieces/Nephews",
	            "AU"=>"Aunts/Uncles",
	            "TC"=>"Great Grandchildren",
	            "TP"=>"Great Grandparents",
	            "GN"=>"Great Nieces/Nephews",
	            "CS"=>"Cousins",
	            "NG"=>"Neighbor"];

 $pais=["AF"=>"Afganistán",	
		"AF"=>"Afganistán",
		"AL"=>"Albania",
		"DZ"=>"Argelia",
		"AS"=>"Samoa Americana",
		"AD"=>"Andorra",
		"AO"=>"Angola",
		"AI"=>"Anguilla",
		"AQ"=>"Antártida",
		"AG"=>"Antigua y Barbuda",
		"AR"=>"Argentina",
		"AM"=>"Armenia",
		"AW"=>"Aruba",
		"AU"=>"Australia",
		"AT"=>"Austria",
		"AZ"=>"Azerbaiyán",
		"BS"=>"Bahamas",
		"BH"=>"Bahrein",
		"BD"=>"Bangladesh",
		"BB"=>"Barbados",
		"BY"=>"Bielorrusia",
		"BE"=>"Bélgica",
		"BZ"=>"Belice",
		"BJ"=>"Benin",
		"BM"=>"Bermudas",
		"BT"=>"Bután",
		"BO"=>"Bolivia",
		"BA"=>"Bosnia y Herzegovina",
		"BW"=>"Botswana",
		"BV"=>"Isla Bouvet",
		"BR"=>"Brasil",
		"IO"=>"Territorios británicos del océano Índico",
		"BN"=>"Brunei",
		"BG"=>"Bulgaria",
		"BF"=>"Burkina Faso",
		"BI"=>"Burundi",
		"KH"=>"Camboya",
		"CM"=>"Camerún",
		"CA"=>"Canadá",
		"CV"=>"Cabo Verde",
		"KY"=>"Islas Caimán",
		"CF"=>"República Centroafricana",
		"TD"=>"Chad",
		"CL"=>"Chile",
		"CN"=>"China",
		"CX"=>"Isla de Christmas",
		"CC"=>"Islas de Cocos o Keeling",
		"CO"=>"Colombia",
		"KM"=>"Comores",
		"CG"=>"Congo",
		"CD"=>"Congo, República Democrática del",
		"CK"=>"Islas Cook",
		"CR"=>"Costa Rica",
		"CI"=>"Costa de Marfíl",
		"HR"=>"Croacia (Hrvatska)",
		"CU"=>"Cuba",
		"CY"=>"Chipre",
		"CZ"=>"República Checa",
		"DK"=>"Dinamarca",
		"DJ"=>"Djibouti",
		"DM"=>"Dominica",
		"DO"=>"República Dominicana",
		"TP"=>"Timor Oriental",
		"EC"=>"Ecuador",
		"EG"=>"Egipto",
		"SV"=>"El Salvador",
		"GQ"=>"Guinea Ecuatorial",
		"ER"=>"Eritrea",
		"EE"=>"Estonia",
		"ET"=>"Etiopía",
		"FK"=>"Islas Malvinas",
		"FO"=>"Islas Faroe",
		"FJ"=>"Fiji",
		"FI"=>"Finlandia",
		"FR"=>"Francia",
		"GF"=>"Guayana Francesa",
		"PF"=>"Polinesia Francesa",
		"TF"=>"Territorios franceses del Sur",
		"GA"=>"Gabón",
		"GM"=>"Gambia",
		"GE"=>"Georgia",
		"DE"=>"Alemania",
		"GH"=>"Ghana",
		"GI"=>"Gibraltar",
		"GR"=>"Grecia",
		"GL"=>"Groenlandia",
		"GD"=>"Granada",
		"GP"=>"Guadalupe",
		"GU"=>"Guam",
		"GT"=>"Guatemala",
		"GN"=>"Guinea",
		"GW"=>"Guinea-Bissau",
		"GY"=>"Guayana",
		"HT"=>"Haití",
		"HM"=>"Islas Heard y McDonald",
		"HN"=>"Honduras",
		"HK"=>"Hong Kong",
		"HU"=>"Hungría",
		"IS"=>"Islandia",
		"IN"=>"India",
		"ID"=>"Indonesia",
		"IR"=>"Irán",
		"IQ"=>"Irak",
		"IE"=>"Irlanda",
		"IL"=>"Israel",
		"IT"=>"Italia",
		"JM"=>"Jamaica",
		"JP"=>"Japón",
		"JO"=>"Jordania",
		"KZ"=>"Kazajistán",
		"KE"=>"Kenia",
		"KI"=>"Kiribati",
		"KR"=>"Corea",
		"KP"=>"Corea del Norte",
		"KW"=>"Kuwait",
		"KG"=>"Kirguizistán",
		"LA"=>"Laos",
		"LV"=>"Letonia",
		"LB"=>"Líbano",
		"LS"=>"Lesotho",
		"LR"=>"Liberia",
		"LY"=>"Libia",
		"LI"=>"Liechtenstein",
		"LT"=>"Lituania",
		"LU"=>"Luxemburgo",
		"MO"=>"Macao",
		"MG"=>"Madagascar",
		"MW"=>"Malawi",
		"MY"=>"Malasia",
		"MV"=>"Maldivas",
		"ML"=>"Malí",
		"MT"=>"Malta",
		"MH"=>"Islas Marshall",
		"MQ"=>"Martinica",
		"MR"=>"Mauritania",
		"MU"=>"Mauricio",
		"YT"=>"Mayotte",
		"MX"=>"México",
		"FM"=>"Micronesia",
		"MD"=>"Moldavia",
		"MC"=>"Mónaco",
		"MN"=>"Mongolia",
		"MS"=>"Montserrat",
		"MA"=>"Marruecos",
		"MZ"=>"Mozambique",
		"MM"=>"Birmania",
		"NA"=>"Namibia",
		"NR"=>"Nauru",
		"NP"=>"Nepal",
		"AN"=>"Antillas Holandesas",
		"NL"=>"Países Bajos",
		"NC"=>"Nueva Caledonia",
		"NZ"=>"Nueva Zelanda",
		"NI"=>"Nicaragua",
		"NE"=>"Níger",
		"NG"=>"Nigeria",
		"NU"=>"Niue",
		"NF"=>"Norfolk",
		"MP"=>"Islas Marianas del Norte",
		"NO"=>"Noruega",
		"OM"=>"Omán",
		"PK"=>"Paquistán",
		"PW"=>"Islas Palau",
		"PA"=>"Panamá",
		"PG"=>"Papúa Nueva Guinea",
		"PY"=>"Paraguay",
		"PE"=>"Perú",
		"PH"=>"Filipinas",
		"PN"=>"Pitcairn",
		"PL"=>"Polonia",
		"PT"=>"Portugal",
		"PR"=>"Puerto Rico",
		"QA"=>"Qatar",
		"RE"=>"Reunión",
		"RO"=>"Rumania",
		"RU"=>"Rusia",
		"RW"=>"Ruanda",
		"SH"=>"Santa Helena",
		"KN"=>"Saint Kitts y Nevis",
		"LC"=>"Santa Lucía",
		"PM"=>"St. Pierre y Miquelon",
		"VC"=>"San Vicente y Granadinas",
		"WS"=>"Samoa",
		"SM"=>"San Marino",
		"ST"=>"Santo Tomé y Príncipe",
		"SA"=>"Arabia Saudí",
		"SN"=>"Senegal",
		"SC"=>"Seychelles",
		"SL"=>"Sierra Leona",
		"SG"=>"Singapur",
		"SK"=>"República Eslovaca",
		"SI"=>"Eslovenia",
		"SB"=>"Islas Salomón",
		"SO"=>"Somalia",
		"ZA"=>"República de Sudáfrica",
		"ES"=>"España",
		"LK"=>"Sri Lanka",
		"SD"=>"Sudán",
		"SR"=>"Surinam",
		"SJ"=>"Islas Svalbard y Jan Mayen",
		"SZ"=>"Suazilandia",
		"SE"=>"Suecia",
		"CH"=>"Suiza",
		"SY"=>"Siria",
		"TW"=>"Taiwán",
		"TJ"=>"Tayikistán",
		"TZ"=>"Tanzania",
		"TH"=>"Tailandia",
		"TG"=>"Togo",
		"TK"=>"Islas Tokelau",
		"TO"=>"Tonga",
		"TT"=>"Trinidad y Tobago",
		"TN"=>"Túnez",
		"TR"=>"Turquía",
		"TM"=>"Turkmenistán",
		"TC"=>"Islas Turks y Caicos",
		"TV"=>"Tuvalu",
		"UG"=>"Uganda",
		"UA"=>"Ucrania",
		"AE"=>"Emiratos Árabes Unidos",
		"UK"=>"Reino Unido",
		"US"=>"Estados Unidos",
		"UM"=>"Islas menores de Estados Unidos",
		"UY"=>"Uruguay",
		"UZ"=>"Uzbekistán",
		"VU"=>"Vanuatu",
		"VA"=>"Ciudad del Vaticano (Santa Sede)",
		"VE"=>"Venezuela",
		"VN"=>"Vietnam",
		"VG"=>"Islas Vírgenes (Reino Unido)",
		"VI"=>"Islas Vírgenes (EE.UU.)",
		"WF"=>"Islas Wallis y Futuna",
		"YE"=>"Yemen",
		"YU"=>"Yugoslavia",
		"ZM"=>"Zambia",
		"ZW"=>"Zimbabue"];

$contry=["BD"=> "Bangladesh", "BE"=> "Belgium", "BF"=> "Burkina Faso", "BG"=> "Bulgaria", "BA"=> "Bosnia and Herzegovina", "BB"=> "Barbados", "WF"=> "Wallis and Futuna", "BL"=> "Saint Barthelemy", "BM"=> "Bermuda", "BN"=> "Brunei", "BO"=> "Bolivia", "BH"=> "Bahrain", "BI"=> "Burundi", "BJ"=> "Benin", "BT"=> "Bhutan", "JM"=> "Jamaica", "BV"=> "Bouvet Island", "BW"=> "Botswana", "WS"=> "Samoa", "BQ"=> "Bonaire, Saint Eustatius and Saba ", "BR"=> "Brazil", "BS"=> "Bahamas", "JE"=> "Jersey", "BY"=> "Belarus", "BZ"=> "Belize", "RU"=> "Russia", "RW"=> "Rwanda", "RS"=> "Serbia", "TL"=> "East Timor", "RE"=> "Reunion", "TM"=> "Turkmenistan", "TJ"=> "Tajikistan", "RO"=> "Romania", "TK"=> "Tokelau", "GW"=> "Guinea-Bissau", "GU"=> "Guam", "GT"=> "Guatemala", "GS"=> "South Georgia and the South Sandwich Islands", "GR"=> "Greece", "GQ"=> "Equatorial Guinea", "GP"=> "Guadeloupe", "JP"=> "Japan", "GY"=> "Guyana", "GG"=> "Guernsey", "GF"=> "French Guiana", "GE"=> "Georgia", "GD"=> "Grenada", "GB"=> "United Kingdom", "GA"=> "Gabon", "SV"=> "El Salvador", "GN"=> "Guinea", "GM"=> "Gambia", "GL"=> "Greenland", "GI"=> "Gibraltar", "GH"=> "Ghana", "OM"=> "Oman", "TN"=> "Tunisia", "JO"=> "Jordan", "HR"=> "Croatia", "HT"=> "Haiti", "HU"=> "Hungary", "HK"=> "Hong Kong", "HN"=> "Honduras", "HM"=> "Heard Island and McDonald Islands", "VE"=> "Venezuela", "PR"=> "Puerto Rico", "PS"=> "Palestinian Territory", "PW"=> "Palau", "PT"=> "Portugal", "SJ"=> "Svalbard and Jan Mayen", "PY"=> "Paraguay", "IQ"=> "Iraq", "PA"=> "Panama", "PF"=> "French Polynesia", "PG"=> "Papua New Guinea", "PE"=> "Peru", "PK"=> "Pakistan", "PH"=> "Philippines", "PN"=> "Pitcairn", "PL"=> "Poland", "PM"=> "Saint Pierre and Miquelon", "ZM"=> "Zambia", "EH"=> "Western Sahara", "EE"=> "Estonia", "EG"=> "Egypt", "ZA"=> "South Africa", "EC"=> "Ecuador", "IT"=> "Italy", "VN"=> "Vietnam", "SB"=> "Solomon Islands", "ET"=> "Ethiopia", "SO"=> "Somalia", "ZW"=> "Zimbabwe", "SA"=> "Saudi Arabia", "ES"=> "Spain", "ER"=> "Eritrea", "ME"=> "Montenegro", "MD"=> "Moldova", "MG"=> "Madagascar", "MF"=> "Saint Martin", "MA"=> "Morocco", "MC"=> "Monaco", "UZ"=> "Uzbekistan", "MM"=> "Myanmar", "ML"=> "Mali", "MO"=> "Macao", "MN"=> "Mongolia", "MH"=> "Marshall Islands", "MK"=> "Macedonia", "MU"=> "Mauritius", "MT"=> "Malta", "MW"=> "Malawi", "MV"=> "Maldives", "MQ"=> "Martinique", "MP"=> "Northern Mariana Islands", "MS"=> "Montserrat", "MR"=> "Mauritania", "IM"=> "Isle of Man", "UG"=> "Uganda", "TZ"=> "Tanzania", "MY"=> "Malaysia", "MX"=> "Mexico", "IL"=> "Israel", "FR"=> "France", "IO"=> "British Indian Ocean Territory", "SH"=> "Saint Helena", "FI"=> "Finland", "FJ"=> "Fiji", "FK"=> "Falkland Islands", "FM"=> "Micronesia", "FO"=> "Faroe Islands", "NI"=> "Nicaragua", "NL"=> "Netherlands", "NO"=> "Norway", "NA"=> "Namibia", "VU"=> "Vanuatu", "NC"=> "New Caledonia", "NE"=> "Niger", "NF"=> "Norfolk Island", "NG"=> "Nigeria", "NZ"=> "New Zealand", "NP"=> "Nepal", "NR"=> "Nauru", "NU"=> "Niue", "CK"=> "Cook Islands", "XK"=> "Kosovo", "CI"=> "Ivory Coast", "CH"=> "Switzerland", "CO"=> "Colombia", "CN"=> "China", "CM"=> "Cameroon", "CL"=> "Chile", "CC"=> "Cocos Islands", "CA"=> "Canada", "CG"=> "Republic of the Congo", "CF"=> "Central African Republic", "CD"=> "Democratic Republic of the Congo", "CZ"=> "Czech Republic", "CY"=> "Cyprus", "CX"=> "Christmas Island", "CR"=> "Costa Rica", "CW"=> "Curacao", "CV"=> "Cape Verde", "CU"=> "Cuba", "SZ"=> "Swaziland", "SY"=> "Syria", "SX"=> "Sint Maarten", "KG"=> "Kyrgyzstan", "KE"=> "Kenya", "SS"=> "South Sudan", "SR"=> "Suriname", "KI"=> "Kiribati", "KH"=> "Cambodia", "KN"=> "Saint Kitts and Nevis", "KM"=> "Comoros", "ST"=> "Sao Tome and Principe", "SK"=> "Slovakia", "KR"=> "South Korea", "SI"=> "Slovenia", "KP"=> "North Korea", "KW"=> "Kuwait", "SN"=> "Senegal", "SM"=> "San Marino", "SL"=> "Sierra Leone", "SC"=> "Seychelles", "KZ"=> "Kazakhstan", "KY"=> "Cayman Islands", "SG"=> "Singapore", "SE"=> "Sweden", "SD"=> "Sudan", "DO"=> "Dominican Republic", "DM"=> "Dominica", "DJ"=> "Djibouti", "DK"=> "Denmark", "VG"=> "British Virgin Islands", "DE"=> "Germany", "YE"=> "Yemen", "DZ"=> "Algeria", "US"=> "United States", "UY"=> "Uruguay", "YT"=> "Mayotte", "UM"=> "United States Minor Outlying Islands", "LB"=> "Lebanon", "LC"=> "Saint Lucia", "LA"=> "Laos", "TV"=> "Tuvalu", "TW"=> "Taiwan", "TT"=> "Trinidad and Tobago", "TR"=> "Turkey", "LK"=> "Sri Lanka", "LI"=> "Liechtenstein", "LV"=> "Latvia", "TO"=> "Tonga", "LT"=> "Lithuania", "LU"=> "Luxembourg", "LR"=> "Liberia", "LS"=> "Lesotho", "TH"=> "Thailand", "TF"=> "French Southern Territories", "TG"=> "Togo", "TD"=> "Chad", "TC"=> "Turks and Caicos Islands", "LY"=> "Libya", "VA"=> "Vatican", "VC"=> "Saint Vincent and the Grenadines", "AE"=> "United Arab Emirates", "AD"=> "Andorra", "AG"=> "Antigua and Barbuda", "AF"=> "Afghanistan", "AI"=> "Anguilla", "VI"=> "U.S. Virgin Islands", "IS"=> "Iceland", "IR"=> "Iran", "AM"=> "Armenia", "AL"=> "Albania", "AO"=> "Angola", "AQ"=> "Antarctica", "AS"=> "American Samoa", "AR"=> "Argentina", "AU"=> "Australia", "AT"=> "Austria", "AW"=> "Aruba", "IN"=> "India", "AX"=> "Aland Islands", "AZ"=> "Azerbaijan", "IE"=> "Ireland", "ID"=> "Indonesia", "UA"=> "Ukraine", "QA"=> "Qatar", "MZ"=> "Mozambique"];
?>
