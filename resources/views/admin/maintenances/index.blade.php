@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Maintenances <small>view maintenances</small></h2>
         <!-- Full Table -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of maintenances</h3>
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

        const maintenances = [

 {
   "TOWER NAME": "PENCIL",
   "Tower Owner": "BANJO",
   "NCC Identity": "LAG-0000",
   "Coordinates": "00.000N",
   "FIELD5": "00.000W",
   "DATE OF ERECTION": "20/3/2010",
   "INSURANCE EXPIRY": "20/3/2020",
   "TOWER STATUS": "ACTIVE",
   "MAINTENANCE SCHEDULE -Mthly": "1st and 16th",
   "MAINTENANCE REPORT -JAN-2020": "1st and 16th",
   "MAINTENANCE REPORT -FEB-2020": "1st and 16th",
   "MAINTENANCE REPORT -MAR-2020": "1st and 16th",
   "MAINTENANCE REPORT -APR-2020": "1st and 16th",
   "MAINTENANCE REPORT -MAY-2020": "",
   "MAINTENANCE REPORT -JUN-2020": "1st and 16th"
 },
 {
   "TOWER NAME": "NEEDLE",
   "Tower Owner": "IHS",
   "NCC Identity": "LAG-3111",
   "Coordinates": "41.02N",
   "FIELD5": "73.32W",
   "DATE OF ERECTION": "2-Nov",
   "INSURANCE EXPIRY": "2-Nov",
   "TOWER STATUS": "INACTIVE",
   "MAINTENANCE SCHEDULE -Mthly": "10th and 24th",
   "MAINTENANCE REPORT -JAN-2020": "",
   "MAINTENANCE REPORT -FEB-2020": "10th and 24th",
   "MAINTENANCE REPORT -MAR-2020": "10th and 24th",
   "MAINTENANCE REPORT -APR-2020": "",
   "MAINTENANCE REPORT -MAY-2020": "10th and 24th",
   "MAINTENANCE REPORT -JUN-2020": "10th and 24th"
 },
 {
   "TOWER NAME": "STRENGHT",
   "Tower Owner": "IHS",
   "NCC Identity": "LAG-1078",
   "Coordinates": "26.49N",
   "FIELD5": "80.03W",
   "DATE OF ERECTION": "10-Oct",
   "INSURANCE EXPIRY": "10-Oct",
   "TOWER STATUS": "INACTIVE",
   "MAINTENANCE SCHEDULE -Mthly": "7th and 28th",
   "MAINTENANCE REPORT -JAN-2020": "7th and 28th",
   "MAINTENANCE REPORT -FEB-2020": "7th and 28th",
   "MAINTENANCE REPORT -MAR-2020": "7th and 28th",
   "MAINTENANCE REPORT -APR-2020": "7th and 28th",
   "MAINTENANCE REPORT -MAY-2020": "7th and 28th",
   "MAINTENANCE REPORT -JUN-2020": "7th and 28th"
 },
 {
   "TOWER NAME": "POWER",
   "Tower Owner": "GLO",
   "NCC Identity": "IB-0387",
   "Coordinates": "25.46N",
   "FIELD5": "80.11W",
   "DATE OF ERECTION": "23/12/2018",
   "INSURANCE EXPIRY": "23/12/2019",
   "TOWER STATUS": "ACTIVE",
   "MAINTENANCE SCHEDULE -Mthly": "3rd and 18th",
   "MAINTENANCE REPORT -JAN-2020": "3rd and 18th",
   "MAINTENANCE REPORT -FEB-2020": "",
   "MAINTENANCE REPORT -MAR-2020": "3rd and 18th",
   "MAINTENANCE REPORT -APR-2020": "3rd and 18th",
   "MAINTENANCE REPORT -MAY-2020": "3rd and 18th",
   "MAINTENANCE REPORT -JUN-2020": ""
 },
 {
   "TOWER NAME": "ECHO",
   "Tower Owner": "GLO",
   "NCC Identity": "IB-0173",
   "Coordinates": "27.54N",
   "FIELD5": "82.47W",
   "DATE OF ERECTION": "31/01/2017",
   "INSURANCE EXPIRY": "31/01/2020",
   "TOWER STATUS": "ACTIVE",
   "MAINTENANCE SCHEDULE -Mthly": "14th and 28th",
   "MAINTENANCE REPORT -JAN-2020": "14th and 28th",
   "MAINTENANCE REPORT -FEB-2020": "14th and 28th",
   "MAINTENANCE REPORT -MAR-2020": "14th and 28th",
   "MAINTENANCE REPORT -APR-2020": "14th and 28th",
   "MAINTENANCE REPORT -MAY-2020": "14th and 28th",
   "MAINTENANCE REPORT -JUN-2020": "14th and 28th"
 },
 {
   "TOWER NAME": "EGO",
   "Tower Owner": "PAT",
   "NCC Identity": "ABJ-1132",
   "Coordinates": "40.46N",
   "FIELD5": "73.18W",
   "DATE OF ERECTION": "18/08/2016",
   "INSURANCE EXPIRY": "18/08/2020",
   "TOWER STATUS": "ACTIVE",
   "MAINTENANCE SCHEDULE -Mthly": "2nd and 17th",
   "MAINTENANCE REPORT -JAN-2020": "2nd and 17th",
   "MAINTENANCE REPORT -FEB-2020": "2nd and 17th",
   "MAINTENANCE REPORT -MAR-2020": "",
   "MAINTENANCE REPORT -APR-2020": "2nd and 17th",
   "MAINTENANCE REPORT -MAY-2020": "",
   "MAINTENANCE REPORT -JUN-2020": "2nd and 17th"
 },
 {
   "TOWER NAME": "AXE",
   "Tower Owner": "PAT",
   "NCC Identity": "ABJ-0984",
   "Coordinates": "42.51N",
   "FIELD5": "76.59W",
   "DATE OF ERECTION": "20/3/2015",
   "INSURANCE EXPIRY": "20/3/2020",
   "TOWER STATUS": "ACTIVE",
   "MAINTENANCE SCHEDULE -Mthly": "12th and 26th",
   "MAINTENANCE REPORT -JAN-2020": "",
   "MAINTENANCE REPORT -FEB-2020": "12th and 26th",
   "MAINTENANCE REPORT -MAR-2020": "12th and 26th",
   "MAINTENANCE REPORT -APR-2020": "12th and 26th",
   "MAINTENANCE REPORT -MAY-2020": "12th and 26th",
   "MAINTENANCE REPORT -JUN-2020": "12th and 26th"
 },
 {
   "TOWER NAME": "POUNDO",
   "Tower Owner": "ATC",
   "NCC Identity": "KDN-1234",
   "Coordinates": "42.26N",
   "FIELD5": "76.29W",
   "DATE OF ERECTION": "2-Nov",
   "INSURANCE EXPIRY": "2-Nov",
   "TOWER STATUS": "COMMISSIONED",
   "MAINTENANCE SCHEDULE -Mthly": "1st and 16th",
   "MAINTENANCE REPORT -JAN-2020": "1st and 16th",
   "MAINTENANCE REPORT -FEB-2020": "1st and 16th",
   "MAINTENANCE REPORT -MAR-2020": "1st and 16th",
   "MAINTENANCE REPORT -APR-2020": "1st and 16th",
   "MAINTENANCE REPORT -MAY-2020": "1st and 16th",
   "MAINTENANCE REPORT -JUN-2020": "1st and 16th"
 },
 {
   "TOWER NAME": "HARSH",
   "Tower Owner": "ATC",
   "NCC Identity": "KDN-1086",
   "Coordinates": "40.50N",
   "FIELD5": "73.08W",
   "DATE OF ERECTION": "10-Oct",
   "INSURANCE EXPIRY": "10-Oct",
   "TOWER STATUS": "INACTIVE",
   "MAINTENANCE SCHEDULE -Mthly": "10th and 24th",
   "MAINTENANCE REPORT -JAN-2020": "",
   "MAINTENANCE REPORT -FEB-2020": "10th and 24th",
   "MAINTENANCE REPORT -MAR-2020": "10th and 24th",
   "MAINTENANCE REPORT -APR-2020": "",
   "MAINTENANCE REPORT -MAY-2020": "10th and 24th",
   "MAINTENANCE REPORT -JUN-2020": "10th and 24th"
 },
 {
   "TOWER NAME": "TWITTER",
   "Tower Owner": "GLO",
   "NCC Identity": "KAN-2122",
   "Coordinates": "40.50N",
   "FIELD5": "73.10W",
   "DATE OF ERECTION": "23/12/2001",
   "INSURANCE EXPIRY": "23/12/2019",
   "TOWER STATUS": "ACTIVE",
   "MAINTENANCE SCHEDULE -Mthly": "7th and 28th",
   "MAINTENANCE REPORT -JAN-2020": "7th and 28th",
   "MAINTENANCE REPORT -FEB-2020": "7th and 28th",
   "MAINTENANCE REPORT -MAR-2020": "7th and 28th",
   "MAINTENANCE REPORT -APR-2020": "7th and 28th",
   "MAINTENANCE REPORT -MAY-2020": "7th and 28th",
   "MAINTENANCE REPORT -JUN-2020": "7th and 28th"
 },
 {
   "TOWER NAME": "PASSION",
   "Tower Owner": "GLO",
   "NCC Identity": "PHC-2475",
   "Coordinates": "40.44N",
   "FIELD5": "73.53W",
   "DATE OF ERECTION": "31/01/2002",
   "INSURANCE EXPIRY": "31/01/2020",
   "TOWER STATUS": "ACTIVE",
   "MAINTENANCE SCHEDULE -Mthly": "3rd and 18th",
   "MAINTENANCE REPORT -JAN-2020": "3rd and 18th",
   "MAINTENANCE REPORT -FEB-2020": "",
   "MAINTENANCE REPORT -MAR-2020": "3rd and 18th",
   "MAINTENANCE REPORT -APR-2020": "3rd and 18th",
   "MAINTENANCE REPORT -MAY-2020": "3rd and 18th",
   "MAINTENANCE REPORT -JUN-2020": ""
 },
 {
   "TOWER NAME": "SATELLITE",
   "Tower Owner": "PAT",
   "NCC Identity": "PHC-2482",
   "Coordinates": "43.39N",
   "FIELD5": "79.22W",
   "DATE OF ERECTION": "18/08/2003",
   "INSURANCE EXPIRY": "18/08/2020",
   "TOWER STATUS": "DECOMMISSIONED",
   "MAINTENANCE SCHEDULE -Mthly": "14th and 28th",
   "MAINTENANCE REPORT -JAN-2020": "14th and 28th",
   "MAINTENANCE REPORT -FEB-2020": "14th and 28th",
   "MAINTENANCE REPORT -MAR-2020": "14th and 28th",
   "MAINTENANCE REPORT -APR-2020": "14th and 28th",
   "MAINTENANCE REPORT -MAY-2020": "14th and 28th",
   "MAINTENANCE REPORT -JUN-2020": "14th and 28th"
 },
 {
   "TOWER NAME": "BEYOND",
   "Tower Owner": "PAT",
   "NCC Identity": "DEL-1111",
   "Coordinates": "16.29S",
   "FIELD5": "26.51E",
   "DATE OF ERECTION": "18/08/1999",
   "INSURANCE EXPIRY": "18/08/2020",
   "TOWER STATUS": "INACTIVE",
   "MAINTENANCE SCHEDULE -Mthly": "2nd and 17th",
   "MAINTENANCE REPORT -JAN-2020": "2nd and 17th",
   "MAINTENANCE REPORT -FEB-2020": "2nd and 17th",
   "MAINTENANCE REPORT -MAR-2020": "",
   "MAINTENANCE REPORT -APR-2020": "2nd and 17th",
   "MAINTENANCE REPORT -MAY-2020": "",
   "MAINTENANCE REPORT -JUN-2020": "2nd and 17th"
 },
 {
   "TOWER NAME": "ACTION",
   "Tower Owner": "PAT",
   "NCC Identity": "BEN-2346",
   "Coordinates": "16.15S",
   "FIELD5": "26.51E",
   "DATE OF ERECTION": "20/3/2004",
   "INSURANCE EXPIRY": "20/3/2020",
   "TOWER STATUS": "COMMISSIONED",
   "MAINTENANCE SCHEDULE -Mthly": "12th and 26th",
   "MAINTENANCE REPORT -JAN-2020": "",
   "MAINTENANCE REPORT -FEB-2020": "12th and 26th",
   "MAINTENANCE REPORT -MAR-2020": "12th and 26th",
   "MAINTENANCE REPORT -APR-2020": "12th and 26th",
   "MAINTENANCE REPORT -MAY-2020": "12th and 26th",
   "MAINTENANCE REPORT -JUN-2020": "12th and 26th"
 }
];

        // Table  Tower
        const table = document.querySelector('#tower_profile');
        const thead = document.createElement('thead');
        const tbody = document.createElement('tbody');

        // Td
        const td = document.createElement('td');

        const head = Object.keys(maintenances[0]);
        //console.log(head);
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
        const headList = head.map(addTableHeader);

        const theadtr = document.createElement('tr');
        headList.forEach(val => {
            //console.log(val);
            theadtr.appendChild(val);
        });

        thead.appendChild(theadtr);

        const bodyList = maintenances.map(addTableBody);

        bodyList.forEach(val=>{
            console.log(val);
            tbody.appendChild(val);
        });


        table.appendChild(thead);

        console.log(tbody);
        table.appendChild(tbody);
        table.children[0].children.forEach((val, index)=>{
            const th = document.createElement('th');
            th.textContent = "S/N";
            val.insertBefore(th, val.firstChild);
        });
        table.children[1].children.forEach((val, index)=>{
            const td = document.createElement('td');
            td.textContent = index + 1
            val.insertBefore(td, val.firstChild);
        })

    }
</script>
@endsection
