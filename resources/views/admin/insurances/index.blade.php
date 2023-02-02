@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Insurances <small>view insurances</small></h2>
         <!-- Full Table -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of insurances</h3>
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

        const insurances = [
 {
   "TOWER NAME": "PENCIL",
   "Tower Owner": "BANJO",
   "NCC Identity": "LAG-0000",
   "Longitude": "00.000N",
   "Latitude": "00.000W",
   "DATE OF ERECTION": "20/3/2010",
   "INSURANCE EXPIRY": "20/3/2020",
   "TOWER STATUS": "ACTIVE",
   "Insurance Type": "COMPREHENSIVE",
   "Insurance Limit": "100M",
   "Annual Premium": "1,000,000"
 },
 {
   "TOWER NAME": "NEEDLE",
   "Tower Owner": "IHS",
   "NCC Identity": "LAG-3111",
   "Longitude": "41.02N",
   "Latitude": "73.32W",
   "DATE OF ERECTION": "2-Nov",
   "INSURANCE EXPIRY": "2-Nov",
   "TOWER STATUS": "INACTIVE",
   "Insurance Type": "COMPREHENSIVE",
   "Insurance Limit": "100M",
   "Annual Premium": "1,000,000"
 },
 {
   "TOWER NAME": "STRENGHT",
   "Tower Owner": "IHS",
   "NCC Identity": "LAG-1078",
   "Longitude": "26.49N",
   "Latitude": "80.03W",
   "DATE OF ERECTION": "10-Oct",
   "INSURANCE EXPIRY": "10-Oct",
   "TOWER STATUS": "INACTIVE",
   "Insurance Type": "COMPREHENSIVE",
   "Insurance Limit": "30M",
   "Annual Premium": "75,000"
 },
 {
   "TOWER NAME": "POWER",
   "Tower Owner": "GLO",
   "NCC Identity": "IB-0387",
   "Longitude": "25.46N",
   "Latitude": "80.11W",
   "DATE OF ERECTION": "23/12/2018",
   "INSURANCE EXPIRY": "23/12/2019",
   "TOWER STATUS": "ACTIVE",
   "Insurance Type": "PUBLIC LIABILITY",
   "Insurance Limit": "30M",
   "Annual Premium": "75,000"
 },
 {
   "TOWER NAME": "ECHO",
   "Tower Owner": "GLO",
   "NCC Identity": "IB-0173",
   "Longitude": "27.54N",
   "Latitude": "82.47W",
   "DATE OF ERECTION": "31/01/2017",
   "INSURANCE EXPIRY": "31/01/2020",
   "TOWER STATUS": "ACTIVE",
   "Insurance Type": "COMPREHENSIVE",
   "Insurance Limit": "100M",
   "Annual Premium": "1,000,000"
 },
 {
   "TOWER NAME": "EGO",
   "Tower Owner": "PAT",
   "NCC Identity": "ABJ-1132",
   "Longitude": "40.46N",
   "Latitude": "73.18W",
   "DATE OF ERECTION": "18/08/2016",
   "INSURANCE EXPIRY": "18/08/2020",
   "TOWER STATUS": "ACTIVE",
   "Insurance Type": "PUBLIC LIABILITY",
   "Insurance Limit": "30M",
   "Annual Premium": "75,000"
 },
 {
   "TOWER NAME": "AXE",
   "Tower Owner": "PAT",
   "NCC Identity": "ABJ-0984",
   "Longitude": "42.51N",
   "Latitude": "76.59W",
   "DATE OF ERECTION": "20/3/2015",
   "INSURANCE EXPIRY": "20/3/2020",
   "TOWER STATUS": "ACTIVE",
   "Insurance Type": "COMPREHENSIVE",
   "Insurance Limit": "100M",
   "Annual Premium": "1,000,000"
 },
 {
   "TOWER NAME": "POUNDO",
   "Tower Owner": "ATC",
   "NCC Identity": "KDN-1234",
   "Longitude": "42.26N",
   "Latitude": "76.29W",
   "DATE OF ERECTION": "2-Nov",
   "INSURANCE EXPIRY": "2-Nov",
   "TOWER STATUS": "COMMISSIONED",
   "Insurance Type": "PUBLIC LIABILITY",
   "Insurance Limit": "30M",
   "Annual Premium": "75,000"
 },
 {
   "TOWER NAME": "HARSH",
   "Tower Owner": "ATC",
   "NCC Identity": "KDN-1086",
   "Longitude": "40.50N",
   "Latitude": "73.08W",
   "DATE OF ERECTION": "10-Oct",
   "INSURANCE EXPIRY": "10-Oct",
   "TOWER STATUS": "INACTIVE",
   "Insurance Type": "COMPREHENSIVE",
   "Insurance Limit": "100M",
   "Annual Premium": "1,000,000"
 },
 {
   "TOWER NAME": "TWITTER",
   "Tower Owner": "GLO",
   "NCC Identity": "KAN-2122",
   "Longitude": "40.50N",
   "Latitude": "73.10W",
   "DATE OF ERECTION": "23/12/2001",
   "INSURANCE EXPIRY": "23/12/2019",
   "TOWER STATUS": "ACTIVE",
   "Insurance Type": "COMPREHENSIVE",
   "Insurance Limit": "100M",
   "Annual Premium": "1,000,000"
 },
 {
   "TOWER NAME": "PASSION",
   "Tower Owner": "GLO",
   "NCC Identity": "PHC-2475",
   "Longitude": "40.44N",
   "Latitude": "73.53W",
   "DATE OF ERECTION": "31/01/2002",
   "INSURANCE EXPIRY": "31/01/2020",
   "TOWER STATUS": "ACTIVE",
   "Insurance Type": "PUBLIC LIABILITY",
   "Insurance Limit": "30M",
   "Annual Premium": "75,000"
 },
 {
   "TOWER NAME": "SATELLITE",
   "Tower Owner": "PAT",
   "NCC Identity": "PHC-2482",
   "Longitude": "43.39N",
   "Latitude": "79.22W",
   "DATE OF ERECTION": "18/08/2003",
   "INSURANCE EXPIRY": "18/08/2020",
   "TOWER STATUS": "DECOMMISSIONED",
   "Insurance Type": "PUBLIC LIABILITY",
   "Insurance Limit": "0",
   "Annual Premium": "0"
 },
 {
   "TOWER NAME": "BEYOND",
   "Tower Owner": "PAT",
   "NCC Identity": "DEL-1111",
   "Longitude": "16.29S",
   "Latitude": "26.51E",
   "DATE OF ERECTION": "18/08/1999",
   "INSURANCE EXPIRY": "18/08/2020",
   "TOWER STATUS": "INACTIVE",
   "Insurance Type": "COMPREHENSIVE",
   "Insurance Limit": "100M",
   "Annual Premium": "1,000,000"
 },
 {
   "TOWER NAME": "ACTION",
   "Tower Owner": "PAT",
   "NCC Identity": "BEN-2346",
   "Longitude": "16.15S",
   "Latitude": "26.51E",
   "DATE OF ERECTION": "20/3/2004",
   "INSURANCE EXPIRY": "20/3/2020",
   "TOWER STATUS": "COMMISSIONED",
   "Insurance Type": "PUBLIC LIABILITY",
   "Insurance Limit": "30M",
   "Annual Premium": "75,000"
 }
]

        // Table  Tower
        const table = document.querySelector('#tower_profile');
        const thead = document.createElement('thead');
        const tbody = document.createElement('tbody');

        // Td
        const td = document.createElement('td');

        const head = Object.keys(insurances[0]);
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

        const bodyList = insurances.map(addTableBody);

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
