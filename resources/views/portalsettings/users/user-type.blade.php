@extends('layouts.backend')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Users <small>view users</small></h2>
         <!-- Full Table -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of Users</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter" id="table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>User</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
         </div>
    </div>
    @endsection

    @section('js_after')
        <script>
            const addTr = (value, index) => {
                const td1 = document.createElement("td");
                const td2 = document.createElement("td");
                const tr = document.createElement("tr");
                td1.textContent = index + 1;
                td2.textContent = value;
                tr.appendChild(td1);
                tr.appendChild(td2);
                return tr;
            };
            window.onload = function(e){

                const userTypes = ["Regulator", "Administrator", "Mobile Network Operator"	,"Internet Service Providers","Tower Owners","Maintenance Agents","Maintenance Engineers", "Audit Agents", "Insurance Agents"];

                const trArray = userTypes.map(addTr)
                const table = document.querySelector("#table");

                trArray.forEach(element=>table.children[1].appendChild(element));

            };
        </script>
    @endsection
