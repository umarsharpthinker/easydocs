<nav class="nav put-right">
    <ul class="sf-menu">
        <li @yield('current_admin_home')><a href="{{URL::route('adminHome')}}">Home</a></li>
        <li @yield('current_services')><a style="cursor: pointer">Management</a>
            <ul>
                <li><a href="{{URL::route('employees.index')}}">Manage Employees</a></li>
                <li><a href="{{URL::route('dutydays.index')}}">Doctor Schedules</a></li>
                <li><a href="{{URL::route('medicines.index')}}">Manage Medicines</a></li>
            </ul>
        </li>
        <li @yield('current_about')><a style="cursor: pointer">Patients</a>
            <ul>
                <li><a href="{{URL::route('appointments.index')}}">Appointments</a></li>
                <li><a href="{{URL::route('patients.index')}}">Patients</a></li>
                {{--<li><a href="{{URL::route('searchPmr')}}">Medical Records</a></li>--}}
                {{--<li><a href="{{URL::route('vitalSign')}}">Vital Signs</a></li>--}}
                {{--<li><a href="{{URL::route('appPrescription')}}">Add Prescriptions</a></li>--}}
                <li><a href="{{URL::route('printPrescription')}}">Print Prescription</a></li>
                {{--<li><a href="/app_proc">Add Procedures</a></li>--}}
                {{--<li><a href="{{URL::route('showTestReports')}}">Test Reports</a></li>--}}
                {{--<li><a href="{{URL::route('printTestReports')}}">Print Reports</a></li>--}}
            </ul>
        </li>
        {{--<li @yield('current_contacts')><a style="cursor: pointer">Billing</a>--}}
        {{--<ul>--}}
        {{--<li><a href="{{URL::route('addCheckUpFee')}}">Add Checkup Fee</a></li>--}}
        {{--<li><a href="{{URL::route('checkupFeeInvoice')}}">Checkup Fee Invoice</a></li>--}}
        {{--<li><a href="{{URL::route('addTestFee')}}">Add Test Fee</a></li>--}}
        {{--<li><a href="{{URL::route('testFeeInvoice')}}">Test Fee Invoice</a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--<li @yield('current_reporting')><a style="cursor: pointer">Reporting</a>--}}
        {{--<ul>--}}
        {{--<li> <a href="{{URL::route('patientsReporting')}}">Checked Patients</a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        <li><a href="{{route('logout')}}">Logout</a></li>
    </ul>
</nav>