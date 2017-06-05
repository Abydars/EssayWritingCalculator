<div id="calculatorcont" class="always view-lesssteps" style="display: block;">
	<div class="main">
		<div id="confirmation" style="display: <?php echo ((isset($_POST['custom']) && isset($_GET['confirm'])) ? "block" : "none"); ?>">
			<h2 class="page-title">Confirmation</h2>
			<p>Thank you for your order</p>
		</div>
		<div id="calccontparent" style="display: <?php echo ((isset($_POST['custom']) && isset($_GET['confirm'])) ? "none" : "block"); ?>">
			<script>
				/*
				var calc = {
					"symbols": {
						"GBP": "&pound;",
						"AUD": "A$",
						"USD": "$"
					},
					"exchange": {
						"CMG": 2.2288569884,
						"XXX": 109.407662711,
						"BTC": 0.00137855725537,
						"IMP": 1.0133267941,
						"GGP": 1.0133267941,
						"SKK": 27.6502787843,
						"ZWD": 450.627548699,
						"TVD": 1.69719145216,
						"CYP": 0.830723863232,
						"ZWL": 401.347133843,
						"MTL": 0.851371072366,
						"CLF": 0.0310670289724,
						"XPD": 0.00166806909909,
						"XPT": 0.00128560222057,
						"ERN": 18.8581223963,
						"CDF": 1456.78931883,
						"AZN": 2.2478458538,
						"AMD": 602.44821608,
						"LSL": 17.0358425422,
						"ZMK": 6540.97960486,
						"AFN": 83.239714902,
						"GEL": 3.42987470884,
						"AOA": 206.578310265,
						"TJS": 9.89946831398,
						"TMT": 4.35808282425,
						"ZMW": 12.5271026824,
						"XAU": 0.00106205658083,
						"ANG": 2.21257637101,
						"XAG": 0.0754881487512,
						"JEP": 1.0133267941,
						"SRD": 9.28150837516,
						"MGA": 4121.51767129,
						"GIP": 1.0133267941,
						"MZN": 89.0368050758,
						"PYG": 7239.17807774,
						"NIO": 36.2842975653,
						"RWF": 1021.04063156,
						"SBD": 9.76289247019,
						"SHP": 1.0133267941,
						"SDG": 8.04805891778,
						"MWK": 908.322041675,
						"MNT": 3102.86361886,
						"KPW": 1120.76641714,
						"KYD": 1.04294444345,
						"LBP": 1877.71862486,
						"LRD": 118.296419052,
						"KZT": 414.531125506,
						"LYD": 1.7955260992,
						"MOP": 9.94493728359,
						"WST": 3.22686402205,
						"XDR": 0.92257495953,
						"VUV": 135.495411435,
						"UZS": 4004.84510156,
						"YER": 311.573039063,
						"BAM": 2.31216145222,
						"RSD": 145.96522931,
						"KMF": 582.117677138,
						"UGX": 4552.40926952,
						"TZS": 2734.45887675,
						"STD": 29020.9009019,
						"SOS": 725.061045801,
						"SVC": 10.9506271538,
						"SZL": 17.0331492362,
						"TTD": 8.41018716499,
						"TOP": 2.87385762899,
						"SLL": 6839.41479582,
						"MRO": 449.378344493,
						"HTG": 83.6490824656,
						"CUP": 1.2451715019,
						"FKP": 1.0133267941,
						"EEK": 18.4969915314,
						"ETB": 28.1839103152,
						"CVE": 130.089292661,
						"ALL": 160.097925857,
						"DZD": 137.460707952,
						"DJF": 222.764294619,
						"BIF": 2104.21675176,
						"COP": 3641.19276443,
						"CRC": 689.931586281,
						"GNF": 11486.707105,
						"HNL": 28.909410736,
						"GYD": 260.194588266,
						"KGS": 86.1509288027,
						"BWP": 13.2262128949,
						"BTN": 84.6736544036,
						"BZD": 2.46543976153,
						"BYR": 24936.1157899,
						"IRR": 37447.2781603,
						"TRY": 4.53553527101,
						"GMD": 54.1649603326,
						"TND": 2.85804254451,
						"GTQ": 9.44009466281,
						"SYP": 265.60753307,
						"GHS": 5.27766127913,
						"FJD": 2.61317358077,
						"KHR": 5042.32199694,
						"VEF": 12.4330648402,
						"CLP": 830.902943217,
						"AWG": 2.24161875112,
						"BSD": 1.25146459867,
						"BRL": 4.01405996966,
						"BND": 1.78795794681,
						"BOB": 8.55432709142,
						"ARS": 19.6600136509,
						"XPF": 141.506073425,
						"UYU": 35.6789400073,
						"DOP": 58.1744125687,
						"BBD": 2.49314214934,
						"XAF": 775.367322999,
						"XOF": 775.606595155,
						"XCD": 3.36513824246,
						"UAH": 34.135290935,
						"SCR": 16.4868451818,
						"IQD": 1481.22578963,
						"MAD": 12.5830802088,
						"NAD": 17.0949609203,
						"NGN": 380.818444534,
						"LVL": 0.830835703956,
						"MDL": 25.0286743683,
						"BMD": 1.2451715019,
						"MMK": 1690.19579668,
						"BGN": 2.31240799618,
						"MUR": 44.9008843585,
						"MKD": 72.3569159754,
						"LTL": 4.08178798418,
						"ISK": 141.17663342,
						"RON": 5.32323350834,
						"HRK": 8.91742152739,
						"JMD": 161.120684825,
						"LAK": 10253.6760253,
						"PEN": 4.20494416191,
						"PAB": 1.25148203107,
						"KRW": 1496.69614528,
						"KWD": 0.380667605703,
						"KES": 129.111833032,
						"BDT": 99.0290436474,
						"JOD": 0.882328526246,
						"LKR": 186.588948621,
						"VND": 28137.6800023,
						"PKR": 130.419256161,
						"PGK": 3.95291089074,
						"PLN": 5.14959227666,
						"QAR": 4.53342040412,
						"SAR": 4.67007797645,
						"RUB": 74.2215602995,
						"EGP": 22.3931642902,
						"OMR": 0.479530487439,
						"MVR": 19.1009308391,
						"CZK": 31.9361572912,
						"IDR": 16632.6688762,
						"BHD": 0.469328797324,
						"NPR": 136.059071935,
						"HUF": 363.675995388,
						"ILS": 4.78901675831,
						"AED": 4.57353733956,
						"DKK": 8.78963808578,
						"MXN": 26.4175565564,
						"NOK": 10.6274765101,
						"SEK": 11.2686772239,
						"THB": 44.4874874199,
						"CNY": 8.61434548444,
						"INR": 84.8616753003,
						"PHP": 61.7144351486,
						"MYR": 5.56961850837,
						"ZAR": 17.1318539812,
						"TWD": 39.9152176649,
						"SGD": 1.79167851925,
						"HKD": 9.65723887586,
						"CAD": 1.6484153121,
						"AUD": 1.70501333755,
						"NZD": 1.78843772701,
						"CHF": 1.25412154994,
						"JPY": 143.424211689,
						"USD": 1.2451715019,
						"GBP": 1,
						"EUR": 1.17116647228,
						"CUC": 1.2451715019,
						"BYN": 2.4428658596
					},
					"prices": {
						"1": {
							"id": "1",
							"title": "Type",
							"parent": "0",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						},
						"2": {
							"id": "2",
							"title": "Level",
							"parent": "0",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						},
						"3": {
							"id": "3",
							"title": "Standard",
							"parent": "0",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						},
						"4": {
							"id": "4",
							"title": "Length",
							"parent": "0",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{type:\"range\",min:1000,max:50000,step:250,postfix:' words'}",
							"sortorder": "0",
							"ticks": null
						},
						"5": {
							"id": "5",
							"title": "Delivery Time",
							"parent": "0",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						},
						"6": {
							"id": "6",
							"title": "Time for requesting changes",
							"parent": "0",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						},
						"7": {
							"id": "7",
							"title": "Essay",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "1",
							"ticks": null
						},
						"9": {
							"id": "9",
							"title": "Model Answer",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "2",
							"ticks": null
						},
						"67": {
							"id": "67",
							"title": "Essay Plan",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "3",
							"ticks": null
						},
						"10": {
							"id": "10",
							"title": "Coursework Assignment",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "4",
							"ticks": null
						},
						"69": {
							"id": "69",
							"title": "Outline\/Skeleton Answer",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "4",
							"ticks": null
						},
						"64": {
							"id": "64",
							"title": "Presentation",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "25",
							"showwhen": null,
							"type": null,
							"sortorder": "5",
							"ticks": null
						},
						"68": {
							"id": "68",
							"title": "Poster",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "6",
							"ticks": null
						},
						"65": {
							"id": "65",
							"title": "Personal Statement",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "7",
							"ticks": null
						},
						"70": {
							"id": "70",
							"title": "Exam Notes",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "8",
							"ticks": null
						},
						"61": {
							"id": "61",
							"title": "Paraphrasing",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "-40",
							"showwhen": null,
							"type": null,
							"sortorder": "9",
							"ticks": null
						},
						"71": {
							"id": "71",
							"title": "Academic Edit",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "-40",
							"showwhen": null,
							"type": null,
							"sortorder": "10",
							"ticks": null
						},
						"72": {
							"id": "72",
							"title": "Curriculum Vitae",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "11",
							"ticks": null
						},
						"73": {
							"id": "73",
							"title": "Data Analysis SPSS",
							"parent": "1",
							"addprice": "0",
							"addamount": "100",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "12",
							"ticks": null
						},
						"8": {
							"id": "8",
							"title": "Full Dissertation",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{\"pn\":\"dissertation\"}",
							"sortorder": "13",
							"ticks": null
						},
						"12": {
							"id": "12",
							"title": "Dissertation Proposal",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{\"pn\":\"dissertation\"}",
							"sortorder": "14",
							"ticks": null
						},
						"13": {
							"id": "13",
							"title": "Dissertation Outline\/Skeleton Answer",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{\"pn\":\"dissertation\"}",
							"sortorder": "15",
							"ticks": null
						},
						"11": {
							"id": "11",
							"title": "Literature Review",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "16",
							"ticks": null
						},
						"74": {
							"id": "74",
							"title": "Methodology",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "17",
							"ticks": null
						},
						"75": {
							"id": "75",
							"title": "Analysis \/ Results",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "18",
							"ticks": null
						},
						"76": {
							"id": "76",
							"title": "Discussion",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "19",
							"ticks": null
						},
						"77": {
							"id": "77",
							"title": "Conclusion",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "20",
							"ticks": null
						},
						"78": {
							"id": "78",
							"title": "Legal Practice Course (LPC) Coursework",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "21",
							"ticks": null
						},
						"79": {
							"id": "79",
							"title": "Bar Vocational Course (BVC) Coursework",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "22",
							"ticks": null
						},
						"14": {
							"id": "14",
							"title": "Exam Preparation",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "23",
							"ticks": null
						},
						"15": {
							"id": "15",
							"title": "Proofreading Marking and Editing",
							"parent": "1",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{\"pn\":\"proofreading\"}",
							"sortorder": "24",
							"ticks": null
						},
						"16": {
							"id": "16",
							"title": "GCSE",
							"parent": "2",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						},
						"17": {
							"id": "17",
							"title": "NVQ",
							"parent": "2",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						},
						"18": {
							"id": "18",
							"title": "A-Level",
							"parent": "2",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						},
						"19": {
							"id": "19",
							"title": "Diploma (HND\/HNC)",
							"parent": "2",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{\"proofreading_percentage\":20}",
							"sortorder": "0",
							"ticks": null
						},
						"20": {
							"id": "20",
							"title": "Undergraduate",
							"parent": "2",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{\"proofreading_percentage\":40}",
							"sortorder": "0",
							"ticks": null
						},
						"21": {
							"id": "21",
							"title": "PGD",
							"parent": "2",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{\"proofreading_percentage\":60}",
							"sortorder": "0",
							"ticks": null
						},
						"22": {
							"id": "22",
							"title": "Masters",
							"parent": "2",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{\"proofreading_percentage\":60}",
							"sortorder": "0",
							"ticks": null
						},
						"23": {
							"id": "23",
							"title": "PhD",
							"parent": "2",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{\"proofreading_percentage\":100}",
							"sortorder": "0",
							"ticks": null
						},
						"24": {
							"id": "24",
							"title": "GCSE A* Grade",
							"parent": "3",
							"addprice": "31.25",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "16,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"25": {
							"id": "25",
							"title": "GCSE A  Grade",
							"parent": "3",
							"addprice": "28.75",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "16,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"26": {
							"id": "26",
							"title": "GCSE B Grade",
							"parent": "3",
							"addprice": "26.25",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "16,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"27": {
							"id": "27",
							"title": "Level 2 Distinction",
							"parent": "3",
							"addprice": "31.25",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "17,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"28": {
							"id": "28",
							"title": "Level 2 Merit",
							"parent": "3",
							"addprice": "28.75",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "17,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"29": {
							"id": "29",
							"title": "Level 2 Pass",
							"parent": "3",
							"addprice": "26.25",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "17,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"30": {
							"id": "30",
							"title": "A-Level A* Grade",
							"parent": "3",
							"addprice": "32.5",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "18,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"31": {
							"id": "31",
							"title": "A-Level A Grade",
							"parent": "3",
							"addprice": "30",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "18,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"32": {
							"id": "32",
							"title": "A-Level B Grade",
							"parent": "3",
							"addprice": "27.5",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "18,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"33": {
							"id": "33",
							"title": "HNC\/HND Distinction",
							"parent": "3",
							"addprice": "52.5",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "19,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"34": {
							"id": "34",
							"title": "HNC\/HND Merit",
							"parent": "3",
							"addprice": "31.25",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "19,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"35": {
							"id": "35",
							"title": "HNC\/HND Pass",
							"parent": "3",
							"addprice": "28.75",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "19,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"36": {
							"id": "36",
							"title": "Undergraduate 1st",
							"parent": "3",
							"addprice": "52.5",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "20,-15",
							"type": null,
							"sortorder": "0",
							"ticks": "Plagiarism free\r\nExcellent level of clarity\r\nExcellent level of presentation\r\nOriginal and solid development of the argument\r\n Comprehensive knowledge of the subject\r\nRich and developed knowledge throughout\r\nEvidence of independent thinking\r\nExcellent understanding of the subject\r\nSolid development of the argument\r\nAccurate analysis\r\nExcellent understanding of issues and debates\r\nClear expression, flow and transitions\r\nFully referenced\r\nFree bibliography"
						},
						"37": {
							"id": "37",
							"title": "Undergraduate 2:1",
							"parent": "3",
							"addprice": "31.25",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "20,-15",
							"type": null,
							"sortorder": "0",
							"ticks": "Plagiarism free\r\nRich and developed knowledge throughout\r\nThorough understanding of the subject\r\nSolid development of the argument\r\nAccurate analysis\r\nUnderstanding of issues and debates\r\nClear expression, flow and transitions\r\nFully referenced\r\nFree bibliography"
						},
						"38": {
							"id": "38",
							"title": "Undergraduate 2:2",
							"parent": "3",
							"addprice": "28.75",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "20,-15",
							"type": null,
							"sortorder": "0",
							"ticks": "Plagiarism free\r\nAdequate knowledge and understanding throughout\r\nKey elements interpreted correctly\r\nClear flow and transitions\r\nFully referenced\r\nFree bibliography"
						},
						"39": {
							"id": "39",
							"title": "PGD Distinction",
							"parent": "3",
							"addprice": "56.25",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "21,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"40": {
							"id": "40",
							"title": "PGD Merit",
							"parent": "3",
							"addprice": "41.25",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "21,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"41": {
							"id": "41",
							"title": "PGD Pass",
							"parent": "3",
							"addprice": "33.75",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "21,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"42": {
							"id": "42",
							"title": "Masters Distinction",
							"parent": "3",
							"addprice": "56.25",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "22,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"43": {
							"id": "43",
							"title": "Masters Merit",
							"parent": "3",
							"addprice": "41.25",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "22,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"44": {
							"id": "44",
							"title": "Masters Pass",
							"parent": "3",
							"addprice": "33.75",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "22,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"45": {
							"id": "45",
							"title": "PhD",
							"parent": "3",
							"addprice": "65",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "23,-15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"46": {
							"id": "46",
							"title": "Bronze",
							"parent": "3",
							"addprice": "5",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"47": {
							"id": "47",
							"title": "Silver",
							"parent": "3",
							"addprice": "6.25",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"48": {
							"id": "48",
							"title": "Gold",
							"parent": "3",
							"addprice": "7.5",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"49": {
							"id": "49",
							"title": "Platinum Edit",
							"parent": "3",
							"addprice": "16.25",
							"addamount": "0",
							"percentage": "0",
							"showwhen": "15",
							"type": null,
							"sortorder": "0",
							"ticks": ""
						},
						"50": {
							"id": "50",
							"title": "7 Day Delivery",
							"parent": "5",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{\"date\":7,\"cutoff\":\"18\",\"time\":\"8pm\",\"proofreading\":\"35000\",\"essay\":\"11000\",\"dissertation\":10000}",
							"sortorder": "0",
							"ticks": null
						},
						"51": {
							"id": "51",
							"title": "6 Day Delivery",
							"parent": "5",
							"addprice": "0",
							"addamount": "0",
							"percentage": "10",
							"showwhen": null,
							"type": "{\"date\":6,\"cutoff\":\"18\",\"time\":\"8pm\",\"proofreading\":\"25000\",\"essay\":\"9500\",\"dissertation\":9000}",
							"sortorder": "0",
							"ticks": null
						},
						"52": {
							"id": "52",
							"title": "5 Day Delivery",
							"parent": "5",
							"addprice": "0",
							"addamount": "0",
							"percentage": "15",
							"showwhen": null,
							"type": "{\"date\":5,\"cutoff\":\"18\",\"time\":\"8pm\",\"proofreading\":\"20000\",\"essay\":\"8000\",\"marking\":22500,\"dissertation\":8000}",
							"sortorder": "0",
							"ticks": null
						},
						"53": {
							"id": "53",
							"title": "4 Day Delivery",
							"parent": "5",
							"addprice": "0",
							"addamount": "0",
							"percentage": "25",
							"showwhen": null,
							"type": "{\"date\":4,\"cutoff\":\"18\",\"time\":\"8pm\",\"proofreading\":\"15000\",\"essay\":\"6500\",\"marking\":15000,\"dissertation\":6000}",
							"sortorder": "0",
							"ticks": null
						},
						"54": {
							"id": "54",
							"title": "3 Day Delivery",
							"parent": "5",
							"addprice": "0",
							"addamount": "0",
							"percentage": "45",
							"showwhen": null,
							"type": "{\"date\":3,\"cutoff\":\"18\",\"time\":\"8pm\",\"proofreading\":\"10000\",\"essay\":\"5000\",\"marking\":7500,\"dissertation\":4000}",
							"sortorder": "0",
							"ticks": null
						},
						"55": {
							"id": "55",
							"title": "2 Day Delivery",
							"parent": "5",
							"addprice": "0",
							"addamount": "0",
							"percentage": "75",
							"showwhen": null,
							"type": "{\"date\":2,\"cutoff\":\"18\",\"time\":\"8pm\",\"proofreading\":\"7500\",\"essay\":\"3500\",\"marking\":7500,\"dissertation\":3000}",
							"sortorder": "0",
							"ticks": null
						},
						"62": {
							"id": "62",
							"title": "1 Day Delivery",
							"parent": "5",
							"addprice": "0",
							"addamount": "0",
							"percentage": "100",
							"showwhen": null,
							"type": "{\"date\":1,\"cutoff\":18,\"time\":\"8pm\",\"proofreading\":5000,\"essay\":2500,\"marking\":7500,\"dissertation\":2500}",
							"sortorder": "0",
							"ticks": null
						},
						"63": {
							"id": "63",
							"title": "Next Day Delivery 9am",
							"parent": "5",
							"addprice": "0",
							"addamount": "0",
							"percentage": "150",
							"showwhen": null,
							"type": "{\"date\":1,\"cutoff\":14,\"time\":\"9am\",\"proofreading\":5000,\"essay\":2500,\"marking\":3750,\"dissertation\":2000}",
							"sortorder": "0",
							"ticks": null
						},
						"66": {
							"id": "66",
							"title": "Same Day 8pm",
							"parent": "5",
							"addprice": "0",
							"addamount": "0",
							"percentage": "200",
							"showwhen": null,
							"type": "{\"date\":0,\"cutoff\":12,\"time\":\"8pm\",\"proofreading\":4000,\"essay\":2000,\"marking\":3000,\"condition\":\"Due to the short turnaround of this project, we will call you to confirm delivery times.\",\"nopay\":1,\"dissertation\":2000}",
							"sortorder": "0",
							"ticks": null
						},
						"80": {
							"id": "80",
							"title": "14 Day Delivery",
							"parent": "5",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{\"date\":14,\"cutoff\":\"18\",\"time\":\"8pm\",\"proofreading\":\"70000\",\"essay\":\"22000\",\"max\":false,\"dissertation\":20000}",
							"sortorder": "0",
							"ticks": null
						},
						"81": {
							"id": "81",
							"title": "21 Day Delivery",
							"parent": "5",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": "{\"date\":21,\"cutoff\":\"18\",\"time\":\"8pm\",\"proofreading\":\"100000\",\"essay\":\"33000\",\"max\":true,\"dissertation\":21000}",
							"sortorder": "0",
							"ticks": null
						},
						"56": {
							"id": "56",
							"title": "Standard",
							"parent": "6",
							"addprice": "0",
							"addamount": "0",
							"percentage": "0",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						},
						"57": {
							"id": "57",
							"title": "14 Days (20% Extra Charge)",
							"parent": "6",
							"addprice": "0",
							"addamount": "0",
							"percentage": "20",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						},
						"58": {
							"id": "58",
							"title": "1 Month (40% Extra Charge)",
							"parent": "6",
							"addprice": "0",
							"addamount": "0",
							"percentage": "40",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						},
						"59": {
							"id": "59",
							"title": "2 Months (60% Extra Charge)",
							"parent": "6",
							"addprice": "0",
							"addamount": "0",
							"percentage": "60",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						},
						"60": {
							"id": "60",
							"title": "3 Months (80% Extra Charge)",
							"parent": "6",
							"addprice": "0",
							"addamount": "0",
							"percentage": "80",
							"showwhen": null,
							"type": null,
							"sortorder": "0",
							"ticks": null
						}
					},
					"discountwords": {
						"5000": 5,
						"10000": 10
					},
					"discountwordsexclude": [15],
					"post": [],
					"holiday": [
						[1482523200, 1482825600, "We have adjusted the date to allow for the Christmas period, we will be closed from the 24th and we reopen on the 27th December", "xmas"]
					],
					"ajax": "",//
					"premier": 50,
					"adwords": 0
				};
				*/
				var ajx = "<?php echo admin_url('admin-ajax.php'); ?>";
			</script>
			<noscript>You need JavaScript enabled to be able to complete this form.</noscript>
			<form method="post" name="calcform" action="<?php echo get_bloginfo('url'); ?>/prices/" id="calcform" class="validator">
				<input type="hidden" name="currency" value="USD">
				<input type="hidden" name="price" value="210.00">
				<input type="hidden" name="deliverydate" value="8pm on 18th Jan 2017">
				<input type="hidden" name="iscalculator" value="1">
				<input type="hidden" name="paymenttype" value="sagepay_server">
				<?php wp_nonce_field(EW_Order::NONCE, 'nonce'); ?>
				<input type="hidden" name="pageload" value="<?php echo date("m/d/y h:i:s"); ?>">
				<div style="display:none !important">
					<input type="text" name="email_confirm" value="" autocomplete="off">
				</div>
				<div id="calccont" class="calcview view-lesssteps step_1 loading" data-text="Loading">
					<div id="allsteps">
						<div class="stepsvisual">
							<div class="active" data-step="0">
								<h3>1.<span class="more"> Your Details</span></h3>
								<div></div>
							</div>
							<div class="" data-step="1">
								<h3>2.<span class="more"> Order Details</span></h3>
								<div></div>
							</div>
							<div class="" data-step="2">
								<h3>3.<span class="more"> Make Payment</span></h3>
								<div></div>
							</div>
						</div>
					</div>
					<div id="orderinfo">
						<div class="show" style="display: none;">
							<div class="price-container"><b>Price:</b> <span class="was" title=""></span> <span class="currency">$</span><span class="amount">261.00</span>
							</div>
						</div>
						<div class="show" style="display: block;"><b>Estimated Delivery Date:</b> <span class="calcdate">8pm on 18th Jan 2017</span>
						</div>
					</div>
					<div id="steps" class="stepparent">
						<div class="step step_1" data-step="1" data-submitted="false" data-onsubmit="validate(1);" style="display: block;">
							<div class="title">%NO%.<span class="more"> Your Details</span>
							</div>
							<div class="section">
								<div class="sub">Choose your product options</div>
								<div id="calc" data-focusstep="docalcdate();"> </div>
								<div class="calcinfo">
									<div class="price-container"><b>Price:</b> <span class="was" title=""></span> <span class="currency">�</span><span class="amount">210.00</span>
									</div>
									<div><b>Estimated Delivery Date:</b> <span class="calcdate">8pm on 18th Jan 2017</span>
									</div>
								</div>
								<div id="calcmessage" style="clear: both;">
								</div>
							</div>
							<div class="section hasformitems">
								<div class="sub">Choose your upgrade options</div>
								<p>If you would like a premier service, then upgrade to premier for an additional <span class="currency">�</span><span class="premier">105.00</span>. By upgrading to premier you will be assigned one of our premium researchers from the top 5 in your subject area only, will be able to request changes to your work for three months instead of the standard 7 days and a personal account manager to provide you with a direct point of contact at Essay Writing Service UK. We will even provide their mobile number if you wish to text them.</p>
								<p></p>
								<div class="formitem type-list">
									<label for="premier" style="width: 257px;">Upgrade to our premier service<span class="colon">:</span> </label><span class="element"><select name="premier" id="premier"><option value="0">No</option><option value="1">Yes, please</option></select></span>
								</div>
								<p></p>
							</div>
							<div class="section">
							  <div class="sub">About you</div>
							  <p>How would you like us to contact you?</p>    
								<div class="span12">
									<div class="left2right hasformitems">
										<div class="formitem type-text"><label for="fullname" class="required_label" style="width: 171px;">Full Name<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="fullname" id="fullname" value="" class="required completed" required=""></span></div>          <div class="formitem type-email"><label for="email" class="required_label" style="width: 171px;">Email Address<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="email" name="email" id="email" value="" class="required completed" required=""></span></div>          <div class="formitem type-text"><label for="phone" class="required_label" style="width: 171px;">Telephone Number<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="phone" id="phone" value="" class="required completed" required=""></span></div>          <div class="formitem type-text"><label for="mobile" style="width: 171px;">Mobile<span class="colon">:</span> </label><span class="element"><input type="text" name="mobile" id="mobile" value="" class="skipped"></span></div>          </div>
								</div>
							</div>
							<div class="section">
								<div class="couponcode">Do you have a discount code?
									<input type="text" name="coupon" />
									<input type="button" value="Check" />
									<div class="couponinfo"></div>
								</div>
								<div class="pricecont price-container">
									<div id="currency-selection" style="display:none">
										<a href="<?php echo get_bloginfo('url'); ?>/prices/#" class="gbp active" rel="GBP" title="Great British Pound"></a>
										<a href="<?php echo get_bloginfo('url'); ?>/prices/#" class="usd" rel="USD" title="United States Dollar"></a>
										<a href="<?php echo get_bloginfo('url'); ?>/prices/#" class="aud" rel="AUD" title="Australian Dollar"></a>
									</div>
									<p class="price-container price-amount">Price: <span class="was" title=""></span> <span class="currency">�</span><span class="amount">210.00</span>
									</p>
								</div>
							</div>
						</div>
						<div class="step step_2" data-step="2" data-submitted="false" data-onsubmit="validate(2);" style="display: none;">
						  <div class="title">%NO%.<span class="more"> Order Details</span></div>
							<div class="section hasformitems">
							   <div class="sub">About your order</div>
							   <p>The next step is to give us as much detail as possible about your order. If you are not sure of anything or would like some clarification, please don't hesitate to give us a call on 0203 011 0100 and we would be happy to help you.</p>
							   <div class="formitem hasdesc type-textarea"><label for="essayquestion" class="required_label">Essay Question/Details<span class="colon">:</span>  <span class="star">*</span></label><p>Try to provide as much detail as you can on structure, special requirements etc., and if you have any special requests, mention it here. The researcher will receive your instructions and follow them exactly. Make sure you include all that you need.</p><span class="element"><textarea name="essayquestion" id="essayquestion" class="required" required="" data-message="Fill in the question and/or task details" data-help="&lt;strong&gt;Your Essay Question&lt;/strong&gt;&lt;br&gt;&lt;br&gt;Please try to provide as much information as possible so your researcher fully understands what your individual requirements are.&lt;br&gt;&lt;br&gt;&lt;strong&gt;You can ask for anything! For example,&lt;/strong&gt;&lt;br&gt;&lt;br&gt;&lt;ul&gt;&lt;li&gt;Ask the writer to focus on a particular issue or use a particular approach.&lt;/li&gt;&lt;br&gt;&lt;li&gt;Use specific word counts per section&lt;/li&gt;&lt;/ul&gt;&lt;br&gt;If you don&#39;t provide any specific details then your researcher will approach the essay the way they think is best."></textarea></span></div>		   <div class="formitem type-text"><label for="areaofstudy">Area of Study (Subject)<span class="colon">:</span> </label><span class="element"><input type="text" name="areaofstudy" id="areaofstudy" value=""></span></div>           <div class="formitem type-text"><label for="referencing" class="required_label">Referencing Style<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="referencing" id="referencing" value="" class="required" required="" data-message="Fill in the required referencing style" data-help="&lt;strong&gt;Referencing Style Requirements&lt;/strong&gt;&lt;br&gt;&lt;br&gt;Please tell us here about any referencing requirements that you may have.&lt;br&gt;&lt;br&gt;You may wish to stipulate your specific referencing style such as Harvard or APA for example.&lt;br /&gt;&lt;br /&gt;The most commonly used referencing system is Harvard. Harvard is in text referencing with a bibliography at the end.&lt;br/&gt;&lt;br/&gt;When footnotes are used, referencing appears at the bottom of the page. If you are studying Law, you are most likely to use OSCOLA and Oxford. If you don�t know which system you use, take a look at your module guides or attach one and we will take a look for you."></span></div>           <div class="formitem type-text"><label for="due" class="required_label">When is the Work Due?<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="due" id="due" value="" class="date required" required="" data-message="Enter a future date"></span></div>           <div class="formitem hasdesc type-textarea"><label for="suggestedsources">Suggested Sources<span class="colon">:</span> </label><p> </p><span class="element"><textarea name="suggestedsources" id="suggestedsources" data-help="&lt;strong&gt;Suggested Sources&lt;/strong&gt;&lt;br&gt;&lt;br&gt;If you have any sources, such as journals, websites or texts you think may be useful for the researcher, then please add them here. If you have a list of sources, be sure to add them to your order.&lt;br/&gt;&lt;br /&gt;Suggested sources may or may not be used. If you have a source that must be used, then please add this to the �Required Sources� below."></textarea></span></div>		   <div class="formitem hasdesc type-textarea"><label for="requiredsources">Required Sources<span class="colon">:</span> </label><p> </p><span class="element"><textarea name="requiredsources" id="requiredsources" data-help="&lt;strong&gt;Required Sources&lt;/strong&gt;&lt;br&gt;&lt;br&gt;If you have sources, which MUST be used, then please add them here. If you would like the researcher to look at them but they are not essential in the essay, then please add them to the suggested sources section above. Try not to include a full reading list or a lengthy list. The researcher will need to use everything in this list so please make sure only essential sources are here."></textarea></span></div>      	   <div class="formitem type-checkbox"><label class="check"><input type="checkbox" name="spss" id="spss" value="1"> Do you require SPSS analysis as part of this order?</label></div>        </div>
							<div class="section">
							  <div class="sub">Help your writer to understand what you want from your order.</div>
							  <p><b>If you have a module guide for this order or a marking scheme, please attach it along with any guidance from your lecturer. This will be beneficial to the researcher.</b></p>
							  <p class="warn">All files are sent to your writer so it�s best no to provide any personal information.</p>
							  <strong>Uploads:</strong><br/><br/>
							  <div>
								<input id="input-700" name="files[]" type="file" multiple class="file-loading">
							  </div>
							</div>
						</div>
						<div class="step step_3" data-step="3" data-submitted="false" data-onsubmit="if(validate(3)) payment();" style="display: none;">
						  <div class="title">%NO%.<span class="more"> Make Payment</span></div>
							<div class="billingdetails when true">
								<h4>Bill Payers Information</h4>
								<p>If you paying by credit or debit card, please provide the name and address the card is registered to.</p>									
								<div class="span12">
									<div class="left2right billing hasformitems">
									  <div class="formitem type-text"><label for="address" class="required_label" style="width: 92px;">Address<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="address" id="address" value="" class="required" required=""></span></div>                  <div class="formitem type-text"><label for="town" class="required_label" style="width: 92px;">Town<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="town" id="town" value="" class="required" required=""></span></div>                  <div class="formitem type-text"><label for="county" class="required_label" style="width: 92px;">County<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="county" id="county" value="" class="required" required=""></span></div>                  <div class="formitem type-text"><label for="postcode" class="required_label" style="width: 92px;">Postcode<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><input type="text" name="postcode" id="postcode" value="" class="required" required=""></span></div>                  <div class="formitem type-list"><label for="country" class="required_label" style="width: 92px;">Country<span class="colon">:</span>  <span class="star">*</span></label><span class="element"><select name="country" id="country" class="required" required=""><option value="BN">Brunei Darussalam</option><option value="BG">Bulgaria</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (malvinas)</option><option value="FO">Faroe Islands</option><option value="FM">Federated States Of Micronesia</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GN">Guinea</option><option value="GW">Guinea-bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="VA">Holy See (vatican City State)</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IR">Islamic Republic Of Iran</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libyan Arab Jamahiriya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestinian Territory</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="KR">Republic Of Korea</option><option value="MD">Republic Of Moldova</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russian Federation</option><option value="RW">Rwanda</option><option value="KN">Saint Kitts And Nevis</option><option value="LC">Saint Lucia</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome And Principe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syrian Arab Republic</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TH">Thailand</option><option value="TP">Timor-leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad And Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="UK" selected="selected">United Kingdom</option><option value="TZ">United Republic Of Tanzania</option><option value="US">United States</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Viet Nam</option><option value="VI">Virgin Islands</option><option value="VG">Virgin Islands</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select></span></div>               </div>
								</div>
							</div> 
						</div>
						<div class="stepbuttons">
							<a href="#" class="button next" onclick="" style="float:right">Next</a>
							<a href="#" class="button submit" onclick="" style="float:right; display: none;">Confirm & Pay via PayPal</a>
							<a href="#" class="button prev" onclick="" style="float:left">Previous</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</form>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>