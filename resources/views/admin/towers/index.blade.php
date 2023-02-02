@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Towers <small>view towers</small></h2>
         <!-- Full Table -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of Towers</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter" id="tower_profile">

                    </table>
                </div>
            </div>
        </div>
        <!-- END Full Table -->
    </div>
@endsection

@section('js_after')
<script>
    window.onload = function(){
        const towerProfile = [
            {
                "TOWER NAME": "PENCIL",
                "Tower Owner": "BANJO",
                "NCC Identity": "LAG-0000",
                "1st CONTACT NUMBER": "08095281610",
                "DATE OF ERECTION": "20/3/2010",
                "LANDLORD NAME": "Babayemi Babafemi",
                "LANDLORD CONTACT NO.": "08138000439",
                "INSURER": "Royal Exchange",
                "INSURANCE EXPIRY": "20/3/2020",
                "Longitude": "00.000N",
                "Latitude": "00.000W",
                "DETAILED ADDRESS": "3, TONI ADEYEMI STR, OGBA, IFAKO-IJAIYE",
                "NO. OF ANTENNA": 3,
                "TOWER TYPE": "Self Support ",
                "NO. OF SECTIONS": 0,
                "HEIGHT (meters)": 20,
                "TOWER STATUS": "ACTIVE",
                "POWER": "Generator",
                "1st Back-Up": "Generator",
                "2nd Back-up": "National Grid",
                "MAINTENANCE SCHEDULE -Mthly": "1st and 16th",
                "MAINTENACE AGENT": "BUIDNETICS",
                "MAINTENANCE ENGINEER -NM": "IFEANYI AJETUNMOBI",
                "ENGINEER CONTACT NO.": "07031605408",
                "AUDIT AGENT": "OSACOMMS",
                "ANNUAL AUDIT SCHEDULE": "1ST JANUARY",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "NEEDLE",
                "Tower Owner": "IHS",
                "NCC Identity": "LAG-3111",
                "1st CONTACT NUMBER": "08023262072",
                "DATE OF ERECTION": "11/2/1999",
                "LANDLORD NAME": "Anthony Ikemefuna",
                "LANDLORD CONTACT NO.": "08095281610",
                "INSURER": "Royal Exchange",
                "INSURANCE EXPIRY": "11/2/2020",
                "Longitude": "41.02N",
                "Latitude": "73.32W",
                "DETAILED ADDRESS": "4, WAKIL STR, HALIHU DANTORO, MALALI,",
                "NO. OF ANTENNA": 2,
                "TOWER TYPE": "Lattice",
                "NO. OF SECTIONS": 14,
                "HEIGHT (meters)": 45,
                "TOWER STATUS": "INACTIVE",
                "POWER": "Generator",
                "1st Back-Up": "National Grid",
                "2nd Back-up": "Solar",
                "MAINTENANCE SCHEDULE -Mthly": "10th and 24th",
                "MAINTENACE AGENT": "MAKASA SUN",
                "MAINTENANCE ENGINEER -NM": "TUNDE OGUNSANWO",
                "ENGINEER CONTACT NO.": "07031642200",
                "AUDIT AGENT": "XOUSIA",
                "ANNUAL AUDIT SCHEDULE": "2ND FEBRUARY",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "STRENGHT",
                "Tower Owner": "IHS",
                "NCC Identity": "LAG-1078",
                "1st CONTACT NUMBER": "08037018797",
                "DATE OF ERECTION": "10/10/2019",
                "LANDLORD NAME": "Wole Abu",
                "LANDLORD CONTACT NO.": "08033271329",
                "INSURER": "Royal Exchange",
                "INSURANCE EXPIRY": "10/10/2019",
                "Longitude": "26.49N",
                "Latitude": "80.03W",
                "DETAILED ADDRESS": "5, ANTHONY OKE STR, MARYLAND, IKEJA",
                "NO. OF ANTENNA": 1,
                "TOWER TYPE": "Guy",
                "NO. OF SECTIONS": 14,
                "HEIGHT (meters)": 30,
                "TOWER STATUS": "INACTIVE",
                "POWER": "Generator",
                "1st Back-Up": "National Grid",
                "2nd Back-up": "Solar",
                "MAINTENANCE SCHEDULE -Mthly": "7th and 28th",
                "MAINTENACE AGENT": "OLASCO GROUP",
                "MAINTENANCE ENGINEER -NM": "EBELE JONATHAN",
                "ENGINEER CONTACT NO.": "07031645719",
                "AUDIT AGENT": "APLIWIN",
                "ANNUAL AUDIT SCHEDULE": "3RD MARCH",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "POWER",
                "Tower Owner": "GLO",
                "NCC Identity": "IB-0387",
                "1st CONTACT NUMBER": "08062432523",
                "DATE OF ERECTION": "23/12/2018",
                "LANDLORD NAME": "Sayyadi Sanni",
                "LANDLORD CONTACT NO.": "07030951544",
                "INSURER": "Sunu Assurance",
                "INSURANCE EXPIRY": "23/12/2019",
                "Longitude": "25.46N",
                "Latitude": "80.11W",
                "DETAILED ADDRESS": "6, FALADE AVENUE, IREE, BOLUWADURO LG,",
                "NO. OF ANTENNA": 4,
                "TOWER TYPE": "Self Support",
                "NO. OF SECTIONS": 12,
                "HEIGHT (meters)": 60,
                "TOWER STATUS": "ACTIVE",
                "POWER": "Generator",
                "1st Back-Up": "Solar",
                "2nd Back-up": "Generator",
                "MAINTENANCE SCHEDULE -Mthly": "3rd and 18th",
                "MAINTENACE AGENT": "SUNSHINE TECH",
                "MAINTENANCE ENGINEER -NM": "YAKUBU GOWON",
                "ENGINEER CONTACT NO.": "07031664530",
                "AUDIT AGENT": "AIRMAP",
                "ANNUAL AUDIT SCHEDULE": "4TH APRIL",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "ECHO",
                "Tower Owner": "GLO",
                "NCC Identity": "IB-0173",
                "1st CONTACT NUMBER": "08095281610",
                "DATE OF ERECTION": "31/01/2017",
                "LANDLORD NAME": "Umar Danbatta",
                "LANDLORD CONTACT NO.": "07030953847",
                "INSURER": "FBN Insurance",
                "INSURANCE EXPIRY": "31/01/2020",
                "Longitude": "27.54N",
                "Latitude": "82.47W",
                "DETAILED ADDRESS": "1, FRANCIS CRESCENT, DANBATTA ESTATE, ALIMOSHO LG,",
                "NO. OF ANTENNA": 2,
                "TOWER TYPE": "MONOPOLE",
                "NO. OF SECTIONS": null,
                "HEIGHT (meters)": 20,
                "TOWER STATUS": "ACTIVE",
                "POWER": "Generator",
                "1st Back-Up": "Generator",
                "2nd Back-up": "Solar",
                "MAINTENANCE SCHEDULE -Mthly": "14th and 28th",
                "MAINTENACE AGENT": "ORIOWO ENGNR",
                "MAINTENANCE ENGINEER -NM": "ABBA KYARI",
                "ENGINEER CONTACT NO.": "07031672352",
                "AUDIT AGENT": "ARYEL",
                "ANNUAL AUDIT SCHEDULE": "5TH MAY",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "EGO",
                "Tower Owner": "PAT",
                "NCC Identity": "ABJ-1132",
                "1st CONTACT NUMBER": "08052921602",
                "DATE OF ERECTION": "18/08/2016",
                "LANDLORD NAME": "Falade Toni",
                "LANDLORD CONTACT NO.": "07030963506",
                "INSURER": "AIICO",
                "INSURANCE EXPIRY": "18/08/2020",
                "Longitude": "40.46N",
                "Latitude": "73.18W",
                "DETAILED ADDRESS": "13, SHOLANKE STR, OFF BOLA AHMED TINUBU ROAD, OBAWOLE,",
                "NO. OF ANTENNA": 4,
                "TOWER TYPE": "ROOF-TOP",
                "NO. OF SECTIONS": null,
                "HEIGHT (meters)": 80,
                "TOWER STATUS": "ACTIVE",
                "POWER": "Generator",
                "1st Back-Up": "Generator",
                "2nd Back-up": "Solar",
                "MAINTENANCE SCHEDULE -Mthly": "2nd and 17th",
                "MAINTENACE AGENT": "DELMEC",
                "MAINTENANCE ENGINEER -NM": "DAVID PANTANMI",
                "ENGINEER CONTACT NO.": "07031673498",
                "AUDIT AGENT": "OSACOMMS",
                "ANNUAL AUDIT SCHEDULE": "6TH JUNE",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "AXE",
                "Tower Owner": "PAT",
                "NCC Identity": "ABJ-0984",
                "1st CONTACT NUMBER": "08186960849",
                "DATE OF ERECTION": "20/3/2015",
                "LANDLORD NAME": "Orosanyin Femi",
                "LANDLORD CONTACT NO.": "07030963842",
                "INSURER": "Sunu Assurance",
                "INSURANCE EXPIRY": "20/3/2020",
                "Longitude": "42.51N",
                "Latitude": "76.59W",
                "DETAILED ADDRESS": "1, AKINWA CLOSE, NDIKE, IJU-ISHAGA,",
                "NO. OF ANTENNA": 3,
                "TOWER TYPE": "Roof Top",
                "NO. OF SECTIONS": 12,
                "HEIGHT (meters)": 70,
                "TOWER STATUS": "ACTIVE",
                "POWER": "Generator",
                "1st Back-Up": "National Grid",
                "2nd Back-up": "Generator",
                "MAINTENANCE SCHEDULE -Mthly": "12th and 26th",
                "MAINTENACE AGENT": "OLASCO GROUP",
                "MAINTENANCE ENGINEER -NM": "DUROJAIYE OLABIYI",
                "ENGINEER CONTACT NO.": "07031815775",
                "AUDIT AGENT": "XOUSIA",
                "ANNUAL AUDIT SCHEDULE": "7TH JULY",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "POUNDO",
                "Tower Owner": "ATC",
                "NCC Identity": "KDN-1234",
                "1st CONTACT NUMBER": "07010004680",
                "DATE OF ERECTION": "11/2/2014",
                "LANDLORD NAME": "Bayo Adekanmbi",
                "LANDLORD CONTACT NO.": "07030969251",
                "INSURER": "Sunu Assurance",
                "INSURANCE EXPIRY": "11/2/2020",
                "Longitude": "42.26N",
                "Latitude": "76.29W",
                "DETAILED ADDRESS": "9, MAKASA AVENUE, SURULERE",
                "NO. OF ANTENNA": 0,
                "TOWER TYPE": "Self Support",
                "NO. OF SECTIONS": 16,
                "HEIGHT (meters)": 45,
                "TOWER STATUS": "COMMISSIONED",
                "POWER": "Solar",
                "1st Back-Up": "National Grid",
                "2nd Back-up": "Generator",
                "MAINTENANCE SCHEDULE -Mthly": "1st and 16th",
                "MAINTENACE AGENT": "HIGH-WAVES",
                "MAINTENANCE ENGINEER -NM": "OSIYALE TUNDE",
                "ENGINEER CONTACT NO.": "07031817475",
                "AUDIT AGENT": "APLIWIN",
                "ANNUAL AUDIT SCHEDULE": "8TH AUGUST",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "HARSH",
                "Tower Owner": "ATC",
                "NCC Identity": "KDN-1086",
                "1st CONTACT NUMBER": "07010366449",
                "DATE OF ERECTION": "10/10/1999",
                "LANDLORD NAME": "Kolawole Oyeyemi",
                "LANDLORD CONTACT NO.": "07031004439",
                "INSURER": "FBN Insurance",
                "INSURANCE EXPIRY": "10/10/2020",
                "Longitude": "40.50N",
                "Latitude": "73.08W",
                "DETAILED ADDRESS": "3, TONI ADEYEMI STR, OGBA, IFAKO-IJAIYE",
                "NO. OF ANTENNA": 1,
                "TOWER TYPE": "LATTICE",
                "NO. OF SECTIONS": 14,
                "HEIGHT (meters)": 45,
                "TOWER STATUS": "INACTIVE",
                "POWER": "Solar",
                "1st Back-Up": "Generator",
                "2nd Back-up": "Generator",
                "MAINTENANCE SCHEDULE -Mthly": "10th and 24th",
                "MAINTENACE AGENT": "BUIDNETICS",
                "MAINTENANCE ENGINEER -NM": "USMAN MALA",
                "ENGINEER CONTACT NO.": "07031850803",
                "AUDIT AGENT": "AIRMAP",
                "ANNUAL AUDIT SCHEDULE": "9TH SEPTEMBER",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "TWITTER",
                "Tower Owner": "GLO",
                "NCC Identity": "KAN-2122",
                "1st CONTACT NUMBER": "07010527528",
                "DATE OF ERECTION": "23/12/2001",
                "LANDLORD NAME": "Babayemi Babafemi",
                "LANDLORD CONTACT NO.": "07031014050",
                "INSURER": "AIICO",
                "INSURANCE EXPIRY": "23/12/2019",
                "Longitude": "40.50N",
                "Latitude": "73.10W",
                "DETAILED ADDRESS": "4, WAKIL STR, HALIHU DANTORO, MALALI,",
                "NO. OF ANTENNA": 2,
                "TOWER TYPE": "MONOPOLE",
                "NO. OF SECTIONS": null,
                "HEIGHT (meters)": 45,
                "TOWER STATUS": "ACTIVE",
                "POWER": "National Grid",
                "1st Back-Up": "Generator",
                "2nd Back-up": "Solar",
                "MAINTENANCE SCHEDULE -Mthly": "7th and 28th",
                "MAINTENACE AGENT": "MAKASA SUN",
                "MAINTENANCE ENGINEER -NM": "SUNDAY EHANIRE",
                "ENGINEER CONTACT NO.": "07031856514",
                "AUDIT AGENT": "ARYEL",
                "ANNUAL AUDIT SCHEDULE": "10TH OCTOBER",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "PASSION",
                "Tower Owner": "GLO",
                "NCC Identity": "PHC-2475",
                "1st CONTACT NUMBER": "07030829373",
                "DATE OF ERECTION": "31/01/2002",
                "LANDLORD NAME": "Anthony Ikemefuna",
                "LANDLORD CONTACT NO.": "08033953931",
                "INSURER": "AIICO",
                "INSURANCE EXPIRY": "31/01/2020",
                "Longitude": "40.44N",
                "Latitude": "73.53W",
                "DETAILED ADDRESS": "5, ANTHONY OKE STR, MARYLAND, IKEJA",
                "NO. OF ANTENNA": 3,
                "TOWER TYPE": "ROOF-TOP",
                "NO. OF SECTIONS": null,
                "HEIGHT (meters)": 30,
                "TOWER STATUS": "ACTIVE",
                "POWER": "National Grid",
                "1st Back-Up": "Generator",
                "2nd Back-up": "Generator",
                "MAINTENANCE SCHEDULE -Mthly": "3rd and 18th",
                "MAINTENACE AGENT": "HIGH-WAVES",
                "MAINTENANCE ENGINEER -NM": "PAULEN TALLEN",
                "ENGINEER CONTACT NO.": "08033941251",
                "AUDIT AGENT": "OSACOMMS",
                "ANNUAL AUDIT SCHEDULE": "11TH NOVEMBER",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "SATELLITE",
                "Tower Owner": "PAT",
                "NCC Identity": "PHC-2482",
                "1st CONTACT NUMBER": "07030831228",
                "DATE OF ERECTION": "18/08/2003",
                "LANDLORD NAME": "Wole Abu",
                "LANDLORD CONTACT NO.": "08033959787",
                "INSURER": "Royal Exchange",
                "INSURANCE EXPIRY": "18/08/2020",
                "Longitude": "43.39N",
                "Latitude": "79.22W",
                "DETAILED ADDRESS": "6, FALADE AVENUE, IREE, BOLUWADURO LG,",
                "NO. OF ANTENNA": 1,
                "TOWER TYPE": "LATTICE",
                "NO. OF SECTIONS": 12,
                "HEIGHT (meters)": 50,
                "TOWER STATUS": "DECOMMISSIONED",
                "POWER": "National Grid",
                "1st Back-Up": "Solar",
                "2nd Back-up": "Generator",
                "MAINTENANCE SCHEDULE -Mthly": "14th and 28th",
                "MAINTENACE AGENT": "SUNSHINE TECH",
                "MAINTENANCE ENGINEER -NM": "TUNDE BAKARE",
                "ENGINEER CONTACT NO.": "08033950705",
                "AUDIT AGENT": "XOUSIA",
                "ANNUAL AUDIT SCHEDULE": "12TH DECEMBER",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "BEYOND",
                "Tower Owner": "PAT",
                "NCC Identity": "DEL-1111",
                "1st CONTACT NUMBER": "07030836131",
                "DATE OF ERECTION": "18/08/1999",
                "LANDLORD NAME": "Sayyadi Sanni",
                "LANDLORD CONTACT NO.": "08033963243",
                "INSURER": "FBN Insurance",
                "INSURANCE EXPIRY": "18/08/2020",
                "Longitude": "16.29S",
                "Latitude": "26.51E",
                "DETAILED ADDRESS": "1, FRANCIS CRESCENT, DANBATTA ESTATE, ALIMOSHO LG,",
                "NO. OF ANTENNA": 2,
                "TOWER TYPE": "GUY ",
                "NO. OF SECTIONS": 11,
                "HEIGHT (meters)": 45,
                "TOWER STATUS": "INACTIVE",
                "POWER": "Solar",
                "1st Back-Up": "Generator",
                "2nd Back-up": "Generator",
                "MAINTENANCE SCHEDULE -Mthly": "2nd and 17th",
                "MAINTENACE AGENT": "ORIOWO ENGIR",
                "MAINTENANCE ENGINEER -NM": "AMINU TAMBUWAL",
                "ENGINEER CONTACT NO.": "08033951287",
                "AUDIT AGENT": "APLIWIN",
                "ANNUAL AUDIT SCHEDULE": "13TH JANUARY",
                "NOTE ON MAJOR DEFECT": ""
            },
            {
                "TOWER NAME": "ACTION",
                "Tower Owner": "PAT",
                "NCC Identity": "BEN-2346",
                "1st CONTACT NUMBER": "07030874408",
                "DATE OF ERECTION": "20/3/2004",
                "LANDLORD NAME": "Umar Danbatta",
                "LANDLORD CONTACT NO.": "08033963853",
                "INSURER": "Sunu Assurance",
                "INSURANCE EXPIRY": "20/3/2020",
                "Longitude": "16.15S",
                "Latitude": "26.51E",
                "DETAILED ADDRESS": "13, SHOLANKE STR, OFF BOLA AHMED TINUBU ROAD, OBAWOLE,",
                "NO. OF ANTENNA": 0,
                "TOWER TYPE": "MONOPOLE",
                "NO. OF SECTIONS": null,
                "HEIGHT (meters)": 30,
                "TOWER STATUS": "COMMISSIONED",
                "POWER": "Generator",
                "1st Back-Up": "Generator",
                "2nd Back-up": "Solar",
                "MAINTENANCE SCHEDULE -Mthly": "12th and 26th",
                "MAINTENACE AGENT": "DELMEC",
                "MAINTENANCE ENGINEER -NM": "ABDUL GANDUJE",
                "ENGINEER CONTACT NO.": "08033953901",
                "AUDIT AGENT": "AIRMAP",
                "ANNUAL AUDIT SCHEDULE": "14TH FEBRUARY",
                "NOTE ON MAJOR DEFECT": ""
            }
        ];

        // Table  Tower
        const table = document.querySelector('#tower_profile');
        const thead = document.createElement('thead');
        const tbody = document.createElement('tbody');

        // Td
        const td = document.createElement('td');

        // Convert the object key to table column
        const head = Object.keys(towerProfile[0]);

        // An extra column for action buttons
        head.push("");

        const addTableHeader = (val)=> {
            const th = document.createElement('th');
            th.textContent = val;
            return th;
        };

        const addTableBody = (val, index)=> {
            const tbodytr = document.createElement('tr');
            for (v in val){
                const td = document.createElement('td');
                if(v.toLowerCase().trim() === "insurance expiry"){
                    const span = addTextToSpan(val[v])
                    const confirmExpiry = checkIfDateIsLastYear(convertDateFormat(val[v]));
                    confirmExpiry? span.classList.add('badge', 'badge-danger'):"";
                    val[v] = span
                }
                else if (v.toLowerCase().trim() === "tower status"){
                    const span = addTextToSpan(val[v]);
                    switch(val[v].toLowerCase().trim()) {
                        case 'active':
                            // code block
                            span.classList.add('badge', 'badge-success')
                            break;
                        case 'inactive':
                            // code block
                            span.classList.add('badge', 'badge-info')
                            break;
                        case 'decommissioned':
                            // code block
                            span.classList.add('badge', 'badge-danger')
                            break;
                        case 'commissioned':
                            // code block
                            span.classList.add('badge', 'badge-secondary')
                            break;
                    }
                    val[v] = span
                }
                if( val[v] instanceof HTMLElement)
                td.appendChild(val[v]);
                else
                td.textContent = val[v];
                tbodytr.appendChild(td);
            }
            return tbodytr;
        };

        const addTextToSpan = (value)=> {
            const span = document.createElement('span');
                    span.textContent = value;
                    return span;
        };

        const checkIfDateIsLastYear = (date)=>{
            const dateObject = new Date(date);
            const today = new Date();
            return today.getFullYear() > dateObject.getFullYear()
        }

        const convertDateFormat = (date)=>{
            const dateParts = date.split("/");
            return `${dateParts[1]}/${dateParts[0]}/${dateParts[2]}`;
        };

        const addButton =()=>{
            const div = document.createElement('div')
            div.classList.add('btn-group')
            div.innerHTML = `
                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                    <i class="fa fa-pencil"></i>
                </button>
                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                    <i class="fa fa-times"></i>
                </button>
                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                    Upload AR
                </button>
                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                    Upload MR
                </button>`;
                return div;
        }


        const headList = head.map(addTableHeader);
        const theadtr = document.createElement('tr');
        headList.forEach(val=>{
            //console.log(val);
            theadtr.appendChild(val);
        });

        thead.appendChild(theadtr);

        const bodyList = towerProfile.map(addTableBody);

        bodyList.forEach(val=>{
            console.log(val);
            tbody.appendChild(val);
        });


        table.appendChild(thead);

        console.log(tbody);
        table.appendChild(tbody);
        table.children[1].children.forEach((val, index)=>{
            const td = document.createElement('td');
            const td1 = document.createElement('td');

            td.textContent = index + 1
            val.insertBefore(td, val.firstChild);
            //console.log(addButton);
            td1.appendChild(addButton());
            val.appendChild(td1)
        });
        table.children[0].children.forEach((val, index)=>{
            const th = document.createElement('th');
            th.textContent = "S/N";
            val.insertBefore(th, val.firstChild);
        });
    }
</script>
@endsection
