@extends('layouts.coordinators.master')
@section('datatablecss')
    <!-- DataTables -->
    <link href="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title','Coordinator Dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Dashboard</h4>
                <ol class="breadcrumb pull-right">
                    <li class="active">Dashboard</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Tables</h3>
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
                            <td>Tiger</td>
                            <td>Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>5421</td>
                            <td>t.nixon@datatables.net</td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
