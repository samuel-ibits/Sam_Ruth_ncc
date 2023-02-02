@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Audits <small>view audits</small></h2>
         <!-- Full Table -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of Aduits</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter" id="tower_profile">

                    </table>
                </div>
            </div>
        </div>
        <div class="modal" id="modal-normal" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div style="overflow: auto; -webkit-overflow-scrolling: touch;height:450px;" id="my">
                        <iframe src="{{ asset('Drone_Tower_Report.pdf#toolbar=0')}}" style="overflow: auto; -webkit-overflow-scrolling: touch; border: none;" scrolling="yes" width="100%" height="100%"> </iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Full Table -->
    </div>
@endsection

@section('js_after')
<script>
    window.onload = function(){
        const a1 = document.createElement("a");
        const a2= document.createElement("a");
        const a3 = document.createElement("a");
        const a4 = document.createElement("a");
        const a5 = document.createElement("a");
        const a6 = document.createElement("a");

        a1.textContent = "View Report"
        a1.classList.add('btn', 'btn-default', 'viewreport')
        a1.setAttribute("data-toggle","modal");
        a1.setAttribute("data-target","#modal-normal");
        a1.href = "javascript:(void);"

        a2.textContent = "View Report"
        a2.classList.add('btn', 'btn-default', 'viewreport')
        a2.setAttribute("data-toggle","modal");
        a2.setAttribute("data-target","#modal-normal");
        a2.href = "javascript:(void);"

        a3.textContent = "View Report"
        a3.classList.add('btn', 'btn-default', 'viewreport')
        a3.setAttribute("data-toggle","modal");
        a3.setAttribute("data-target","#modal-normal");
        a3.href = "javascript:(void);"

        a4.textContent = "View Report"
        a4.classList.add('btn', 'btn-default', 'viewreport')
        a4.setAttribute("data-toggle","modal");
        a4.setAttribute("data-target","#modal-normal");
        a4.href = "javascript:(void);"

        a5.textContent = "View Report"
        a5.classList.add('btn', 'btn-default', 'viewreport')
        a5.setAttribute("data-toggle","modal");
        a5.setAttribute("data-target","#modal-normal");
        a5.href = "javascript:(void);"
        a5.href = "javascript:(void);"

        a6.textContent = "View Report"
        a6.classList.add('btn', 'btn-default')
        a6.setAttribute("data-toggle","modal");
        a6.setAttribute("data-target","#modal-normal");
        a6.href = "javascript:(void);"

        const audits = [
            {
                "TOWER NAME": "PENCIL",
                "Tower Owner": "BANJO",
                "NCC Identity": "LAG-0000",
                "Longitude": "00.000N",
                "Latitude": "00.000W",
                "DATE OF ERECTION": "20/3/2010",
                "INSURANCE EXPIRY": "20/3/2020",
                "TOWER STATUS": "ACTIVE",
                "AUDIT AGENT": "OSACOMMS",
                "ANNUAL AUDIT SCHEDULE": "3RD MARCH",
                "AUDIT REPORT 2020": a1,
                "AUDIT REPORT 2021": a2,
                "AUDIT REPORT 2022": a3,
                "AUDIT REPORT 2023": a4,
                "AUDIT REPORT 2024": a5,
                "AUDIT REPORT 2025": a6
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
                "AUDIT AGENT": "XOUSIA",
                "ANNUAL AUDIT SCHEDULE": "2ND FEBRUARY",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
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
                "AUDIT AGENT": "APLIWIN",
                "ANNUAL AUDIT SCHEDULE": "3RD MARCH",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
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
                "AUDIT AGENT": "AIRMAP",
                "ANNUAL AUDIT SCHEDULE": "4TH APRIL",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
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
                "AUDIT AGENT": "ARYEL",
                "ANNUAL AUDIT SCHEDULE": "5TH MAY",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
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
                "AUDIT AGENT": "OSACOMMS",
                "ANNUAL AUDIT SCHEDULE": "6TH JUNE",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
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
                "AUDIT AGENT": "XOUSIA",
                "ANNUAL AUDIT SCHEDULE": "7TH JULY",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
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
                "AUDIT AGENT": "APLIWIN",
                "ANNUAL AUDIT SCHEDULE": "8TH AUGUST",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
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
                "AUDIT AGENT": "AIRMAP",
                "ANNUAL AUDIT SCHEDULE": "9TH SEPTEMBER",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
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
                "AUDIT AGENT": "ARYEL",
                "ANNUAL AUDIT SCHEDULE": "10TH OCTOBER",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
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
                "AUDIT AGENT": "OSACOMMS",
                "ANNUAL AUDIT SCHEDULE": "11TH NOVEMBER",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
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
                "AUDIT AGENT": "XOUSIA",
                "ANNUAL AUDIT SCHEDULE": "12TH DECEMBER",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
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
                "AUDIT AGENT": "APLIWIN",
                "ANNUAL AUDIT SCHEDULE": "13TH JANUARY",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
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
                "AUDIT AGENT": "AIRMAP",
                "ANNUAL AUDIT SCHEDULE": "14TH FEBRUARY",
                "AUDIT REPORT 2020": "",
                "AUDIT REPORT 2021": "",
                "AUDIT REPORT 2022": "",
                "AUDIT REPORT 2023": "",
                "AUDIT REPORT 2024": "",
                "AUDIT REPORT 2025": ""
            }
        ];

        // Table  Tower
        const table = document.querySelector('#tower_profile');
        const thead = document.createElement('thead');
        const tbody = document.createElement('tbody');

        // Td
        const td = document.createElement('td');

        const head = Object.keys(audits[0]);
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
        console.log(val[v])
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
        headList.forEach(val=>{
            //console.log(val);
            theadtr.appendChild(val);
        });

        thead.appendChild(theadtr);

        const bodyList = audits.map(addTableBody);

        bodyList.forEach(val=>{
            //console.log(val);
            tbody.appendChild(val);
        });


        table.appendChild(thead);

        //console.log(tbody);
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
        });

    }
</script>
@endsection
