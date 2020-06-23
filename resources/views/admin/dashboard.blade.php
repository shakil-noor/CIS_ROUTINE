@extends('layouts.admins.master')
@section('datatablecss')
    <!-- DataTables -->
    <link href="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title','Admin Dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Dashboard</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">CRMS</a></li>
                    <li class="active">Dashboard</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Total Students</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>1000</b></h3>
                    <p class="text-muted"><b></b> </p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Total Teacher</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>30</b></h3>
                    <p class="text-muted"><b></b> </p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Departments</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>CIS,BIT,ITM</b></h3>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Class routines</h3>
                </div>
                <div class="panel-body">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Extn.</th>
                            <th>E-mail</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Quinn</td>
                            <td>Flynn</td>
                            <td>Support Lead</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2013/03/03</td>
                            <td>$342,000</td>
                            <td>9497</td>
                            <td>q.flynn@datatables.net</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection