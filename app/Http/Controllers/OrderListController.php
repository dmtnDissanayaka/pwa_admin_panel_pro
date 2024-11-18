<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order_header_infomation;
use App\Models\order_driver_instructions;
use App\Models\order_dispatcher_notes;
use App\Models\order_stops;
use App\Models\order_stops_border;
use App\Models\status_activity;

use DB;
use DataTables;

class OrderListController extends Controller
{
    //get order list page
    public function order_list(Request $request)
    {
        return view('order-list');
    }
    //get order details view page
    public function order_details_view(Request $request,$order_id)
    {

        $order_head_result = order_header_infomation::where('order_id',$order_id)->first();
        $order_instrct_result = order_driver_instructions::where('Order_ID',$order_id)->first();
        $order_note_result = order_dispatcher_notes::where('Order_ID',$order_id)->first();

        $order_status = order_stops::where('Order_ID',$order_id)->where('Stop_Activity','Pickup')->get();
        $order_status_Delivery = order_stops::where('Order_ID',$order_id)->where('Stop_Activity','Delivery')->get();
        $order_status_borderx = order_stops_border::where('Order_ID',$order_id)->get();

        $order_status_changes = status_activity::where('order_id',$order_id)->get();

        return view('order-details-view',compact('order_head_result','order_instrct_result','order_note_result','order_status','order_status_Delivery','order_status_borderx','order_status_changes'));
    }

    function formatPhoneNumber($phoneNumber) {
        // Remove any non-numeric characters
        $cleaned = preg_replace('/[^0-9]/', '', $phoneNumber);

        // Format the number as (XXX) XXX-XXXX
        if(strlen($cleaned) == 10) {
            return '(' . substr($cleaned, 0, 3) . ') ' . substr($cleaned, 3, 3) . '-' . substr($cleaned, 6);
        }

        // Return the original number if it's not 10 digits
        return $phoneNumber;
    }

    //get order list page
    public function get_all_orders(Request $request)
    {
        // return view('order-list');

        $result = DB::select('SELECT
        order_header_infomation.order_id,
        order_header_infomation.driver_loginh_id,
        order_header_infomation.order_number,
        order_header_infomation.order_type,
        order_header_infomation.date_received,
        order_header_infomation.time_received,
        order_header_infomation.is_read,
        order_status.new_status,
        companies.company_name
        FROM order_header_infomation
        LEFT JOIN companies ON order_header_infomation.company_id=companies.company_id
        LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id ORDER BY order_header_infomation.id DESC
        LIMIT 500');

        // dd($result);

        $customArray = array_map(function($location) {
            return [
                'id' => $location->order_id,
                'Company' => $location->company_name,
                'DriverID' => $location->driver_loginh_id,
                'Order' => $location->order_number,
                'Order_id' => $location->order_id,
                'Type' => $location->order_type,
                'ReceivedDate' => $location->date_received,
                'ReceivedTime' => $location->time_received,
                'ReadStatus' => $location->is_read,
                'Status' => $location->new_status,
            ];
        }, $result);

        if ($request->ajax()) {
            $allUserData = DataTables::of($customArray)
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="View"
                class="viewOrder btn btn-info btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-eye-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents"
                class="viewOrderScans btn btn-secondary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-file-pdf-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents Re-send"
                class="orderScanReSend btn btn-primary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-device-recover-line"></i></a> ';
                //     $btn = '<a href="javascript:void(0)" data-toggle="tooltip" " data-original-title="View"
                // class="btn btn-sm btn-dark viewOrder" ><i class="ri-eye-line"></i></a> &nbsp;';
                //     $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" " data-original-title="View"
                // class="btn btn-sm btn-dark viewOrderScans" ><i class="ri-file-pdf-line"></i></a> &nbsp;';
                //     $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" " data-original-title="View"
                // class="btn btn-sm btn-dark orderScanReSend" ><i class="ri-device-recover-line"></i></a> &nbsp;';
                    return $btn;
                })
                ->make(true);
            return $allUserData;
        }
    }

    public function company_filter(Request $request)
    {
        $companyFilter = $request->companyFilter;


        if($companyFilter){
            $result = DB::select('
                SELECT
                order_header_infomation.order_id,
                order_header_infomation.driver_loginh_id,
                order_header_infomation.order_number,
                order_header_infomation.order_type,
                order_header_infomation.date_received,
                order_header_infomation.time_received,
                order_header_infomation.is_read,
                order_status.new_status,
                companies.company_name
                FROM order_header_infomation
                LEFT JOIN companies ON order_header_infomation.company_id = companies.company_id
                LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id
                WHERE companies.company_name LIKE :companyFilter
            ', ['companyFilter' => '%' . $companyFilter . '%']);
        }else{
            $result = DB::select('SELECT
            order_header_infomation.order_id,
            order_header_infomation.driver_loginh_id,
            order_header_infomation.order_number,
            order_header_infomation.order_type,
            order_header_infomation.date_received,
            order_header_infomation.time_received,
            order_header_infomation.is_read,
            order_status.new_status,
            companies.company_name
            FROM order_header_infomation
            LEFT JOIN companies ON order_header_infomation.company_id=companies.company_id
            LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id ORDER BY order_header_infomation.id DESC
            ');
        }
        // Map the results to the desired format
        $customArray = array_map(function($location) {
            return [
                'id' => $location->order_id,
                'Company' => $location->company_name,
                'DriverID' => $location->driver_loginh_id,
                'Order' => $location->order_number,
                'Order_id' => $location->order_id,
                'Type' => $location->order_type,
                'ReceivedDate' => $location->date_received,
                'ReceivedTime' => $location->time_received,
                'ReadStatus' => $location->is_read,
                'Status' => $location->new_status,
            ];
        }, $result);

        $allUserData = DataTables::of($customArray)
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="View"
                class="viewOrder btn btn-info btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-eye-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents"
                class="viewOrderScans btn btn-secondary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-file-pdf-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents Re-send"
                class="orderScanReSend btn btn-primary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-device-recover-line"></i></a> ';
                return $btn;
            })
            ->make(true);
        return $allUserData;
        // }
        return view('order-list');
    }

    public function driver_filter(Request $request)
    {
        $driverFilter = $request->driverFilter;


        if($driverFilter){
            $result = DB::select('
                SELECT
                order_header_infomation.order_id,
                order_header_infomation.driver_loginh_id,
                order_header_infomation.order_number,
                order_header_infomation.order_type,
                order_header_infomation.date_received,
                order_header_infomation.time_received,
                order_header_infomation.is_read,
                order_status.new_status,
                companies.company_name
                FROM order_header_infomation
                LEFT JOIN companies ON order_header_infomation.company_id = companies.company_id
                LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id
                WHERE order_header_infomation.driver_loginh_id LIKE :driverFilter
            ', ['driverFilter' => '%' . $driverFilter . '%']);
        }else{
            $result = DB::select('SELECT
            order_header_infomation.order_id,
            order_header_infomation.driver_loginh_id,
            order_header_infomation.order_number,
            order_header_infomation.order_type,
            order_header_infomation.date_received,
            order_header_infomation.time_received,
            order_header_infomation.is_read,
            order_status.new_status,
            companies.company_name
            FROM order_header_infomation
            LEFT JOIN companies ON order_header_infomation.company_id=companies.company_id
            LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id ORDER BY order_header_infomation.id DESC
            ');
        }
        // Map the results to the desired format
        $customArray = array_map(function($location) {
            return [
                'id' => $location->order_id,
                'Company' => $location->company_name,
                'DriverID' => $location->driver_loginh_id,
                'Order' => $location->order_number,
                'Order_id' => $location->order_id,
                'Type' => $location->order_type,
                'ReceivedDate' => $location->date_received,
                'ReceivedTime' => $location->time_received,
                'ReadStatus' => $location->is_read,
                'Status' => $location->new_status,
            ];
        }, $result);

        $allUserData = DataTables::of($customArray)
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="View"
                class="viewOrder btn btn-info btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-eye-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents"
                class="viewOrderScans btn btn-secondary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-file-pdf-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents Re-send"
                class="orderScanReSend btn btn-primary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-device-recover-line"></i></a> ';
                return $btn;
            })
            ->make(true);
        return $allUserData;
        // }
        return view('order-list');
    }

    public function search_filter(Request $request)
    {
        $orderFilter = $request->orderFilter;

        if($orderFilter){
            $result = DB::select('
                SELECT
                order_header_infomation.order_id,
                order_header_infomation.driver_loginh_id,
                order_header_infomation.order_number,
                order_header_infomation.order_type,
                order_header_infomation.date_received,
                order_header_infomation.time_received,
                order_header_infomation.is_read,
                order_status.new_status,
                companies.company_name
                FROM order_header_infomation
                LEFT JOIN companies ON order_header_infomation.company_id = companies.company_id
                LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id
                WHERE order_header_infomation.order_number LIKE :orderFilter
            ', ['orderFilter' => '%' . $orderFilter . '%']);
        }else{
            $result = DB::select('SELECT
            order_header_infomation.order_id,
            order_header_infomation.driver_loginh_id,
            order_header_infomation.order_number,
            order_header_infomation.order_type,
            order_header_infomation.date_received,
            order_header_infomation.time_received,
            order_header_infomation.is_read,
            order_status.new_status,
            companies.company_name
            FROM order_header_infomation
            LEFT JOIN companies ON order_header_infomation.company_id=companies.company_id
            LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id ORDER BY order_header_infomation.id DESC
            ');
        }
        // Map the results to the desired format
        $customArray = array_map(function($location) {
            return [
                'id' => $location->order_id,
                'Company' => $location->company_name,
                'DriverID' => $location->driver_loginh_id,
                'Order' => $location->order_number,
                'Type' => $location->order_type,
                'Order_id' => $location->order_id,
                'ReceivedDate' => $location->date_received,
                'ReceivedTime' => $location->time_received,
                'ReadStatus' => $location->is_read,
                'Status' => $location->new_status,
            ];
        }, $result);

        $allUserData = DataTables::of($customArray)
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="View"
                class="viewOrder btn btn-info btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-eye-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents"
                class="viewOrderScans btn btn-secondary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-file-pdf-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents Re-send"
                class="orderScanReSend btn btn-primary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-device-recover-line"></i></a> ';
                return $btn;
            })
            ->make(true);
        return $allUserData;
        // }
        return view('order-list');
    }

    public function type_filter(Request $request)
    {
        $type_filter = $request->typeFilter;

        if($type_filter){
            $result = DB::select('
                SELECT
                order_header_infomation.order_id,
                order_header_infomation.driver_loginh_id,
                order_header_infomation.order_number,
                order_header_infomation.order_type,
                order_header_infomation.date_received,
                order_header_infomation.time_received,
                order_header_infomation.is_read,
                order_status.new_status,
                companies.company_name
                FROM order_header_infomation
                LEFT JOIN companies ON order_header_infomation.company_id = companies.company_id
                LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id
                WHERE order_header_infomation.order_type LIKE :type_filter
            ', ['type_filter' => $type_filter . '%']);
        }else{
            $result = DB::select('SELECT
            order_header_infomation.order_id,
            order_header_infomation.driver_loginh_id,
            order_header_infomation.order_number,
            order_header_infomation.order_type,
            order_header_infomation.date_received,
            order_header_infomation.time_received,
            order_header_infomation.is_read,
            order_status.new_status,
            companies.company_name
            FROM order_header_infomation
            LEFT JOIN companies ON order_header_infomation.company_id=companies.company_id
            LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id ORDER BY order_header_infomation.id DESC
            ');
        }
        // Map the results to the desired format
        $customArray = array_map(function($location) {
            return [
                'id' => $location->order_id,
                'Company' => $location->company_name,
                'DriverID' => $location->driver_loginh_id,
                'Order' => $location->order_number,
                'Type' => $location->order_type,
                'Order_id' => $location->order_id,
                'ReceivedDate' => $location->date_received,
                'ReceivedTime' => $location->time_received,
                'ReadStatus' => $location->is_read,
                'Status' => $location->new_status,
            ];
        }, $result);

        $allUserData = DataTables::of($customArray)
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="View"
                class="viewOrder btn btn-info btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-eye-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents"
                class="viewOrderScans btn btn-secondary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-file-pdf-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents Re-send"
                class="orderScanReSend btn btn-primary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-device-recover-line"></i></a> ';
                return $btn;
            })
            ->make(true);
        return $allUserData;
        // }
        return view('order-list');
    }

    public function date_filter(Request $request)
    {
        $date_filter = $request->dateFilter;

        // dd($date_filter);


        if($date_filter){
            $result = DB::select('
                SELECT
                order_header_infomation.order_id,
                order_header_infomation.driver_loginh_id,
                order_header_infomation.order_number,
                order_header_infomation.order_type,
                order_header_infomation.date_received,
                order_header_infomation.time_received,
                order_header_infomation.is_read,
                order_status.new_status,
                companies.company_name
                FROM order_header_infomation
                LEFT JOIN companies ON order_header_infomation.company_id = companies.company_id
                LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id
                WHERE order_header_infomation.date_received LIKE :date_filter
            ', ['date_filter' => '%' . $date_filter . '%']);
        }else{
            $result = DB::select('SELECT
            order_header_infomation.order_id,
            order_header_infomation.driver_loginh_id,
            order_header_infomation.order_number,
            order_header_infomation.order_type,
            order_header_infomation.date_received,
            order_header_infomation.time_received,
            order_header_infomation.is_read,
            order_status.new_status,
            companies.company_name
            FROM order_header_infomation
            LEFT JOIN companies ON order_header_infomation.company_id=companies.company_id
            LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id ORDER BY order_header_infomation.id DESC
            ');
        }
        // Map the results to the desired format
        $customArray = array_map(function($location) {
            return [
                'id' => $location->order_id,
                'Company' => $location->company_name,
                'DriverID' => $location->driver_loginh_id,
                'Order' => $location->order_number,
                'Type' => $location->order_type,
                'Order_id' => $location->order_id,
                'ReceivedDate' => $location->date_received,
                'ReceivedTime' => $location->time_received,
                'ReadStatus' => $location->is_read,
                'Status' => $location->new_status,
            ];
        }, $result);

        $allUserData = DataTables::of($customArray)
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="View"
                class="viewOrder btn btn-info btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-eye-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents"
                class="viewOrderScans btn btn-secondary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-file-pdf-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents Re-send"
                class="orderScanReSend btn btn-primary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-device-recover-line"></i></a> ';
                return $btn;
            })
            ->make(true);
        return $allUserData;
        // }
        return view('order-list');
    }

    public function readStatus_Filter(Request $request)
    {
        $readStatusFilter = $request->readStatusFilter;

        // dd($date_filter);


        if($readStatusFilter){
            $result = DB::select('
                SELECT
                order_header_infomation.order_id,
                order_header_infomation.driver_loginh_id,
                order_header_infomation.order_number,
                order_header_infomation.order_type,
                order_header_infomation.date_received,
                order_header_infomation.time_received,
                order_header_infomation.is_read,
                order_status.new_status,
                companies.company_name
                FROM order_header_infomation
                LEFT JOIN companies ON order_header_infomation.company_id = companies.id
                LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id
                WHERE order_header_infomation.is_read LIKE :readStatusFilter
            ', ['readStatusFilter' => '%' . $readStatusFilter . '%']);
        }else{
            $result = DB::select('SELECT
            order_header_infomation.order_id,
            order_header_infomation.driver_loginh_id,
            order_header_infomation.order_number,
            order_header_infomation.order_type,
            order_header_infomation.date_received,
            order_header_infomation.time_received,
            order_header_infomation.is_read,
            order_status.new_status,
            companies.company_name
            FROM order_header_infomation
            LEFT JOIN companies ON order_header_infomation.company_id=companies.company_id
            LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id ORDER BY order_header_infomation.id DESC
            ');
        }
        // Map the results to the desired format
        $customArray = array_map(function($location) {
            return [
                'id' => $location->order_id,
                'Company' => $location->company_name,
                'DriverID' => $location->driver_loginh_id,
                'Order' => $location->order_number,
                'Type' => $location->order_type,
                'Order_id' => $location->order_id,
                'ReceivedDate' => $location->date_received,
                'ReceivedTime' => $location->time_received,
                'ReadStatus' => $location->is_read,
                'Status' => $location->new_status,
            ];
        }, $result);

        $allUserData = DataTables::of($customArray)
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="View"
                class="viewOrder btn btn-info btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-eye-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents"
                class="viewOrderScans btn btn-secondary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-file-pdf-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents Re-send"
                class="orderScanReSend btn btn-primary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-device-recover-line"></i></a> ';
                return $btn;
            })
            ->make(true);
        return $allUserData;
        // }
        return view('order-list');
    }

    public function status_Filter(Request $request)
    {
        $status_Filter = $request->statusFilter;

        // dd($date_filter);


        if($status_Filter){
            $result = DB::select('
                SELECT
                order_header_infomation.order_id,
                order_header_infomation.driver_loginh_id,
                order_header_infomation.order_number,
                order_header_infomation.order_type,
                order_header_infomation.date_received,
                order_header_infomation.time_received,
                order_header_infomation.is_read,
                order_status.new_status,
                companies.company_name
                FROM order_header_infomation
                LEFT JOIN companies ON order_header_infomation.company_id = companies.company_id
                LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id
                WHERE order_status.new_status LIKE :status_Filter
            ', ['status_Filter' => '%' . $status_Filter . '%']);
        }else{
            $result = DB::select('SELECT
            order_header_infomation.order_id,
            order_header_infomation.driver_loginh_id,
            order_header_infomation.order_number,
            order_header_infomation.order_type,
            order_header_infomation.date_received,
            order_header_infomation.time_received,
            order_header_infomation.is_read,
            order_status.new_status,
            companies.company_name
            FROM order_header_infomation
            LEFT JOIN companies ON order_header_infomation.company_id=companies.company_id
            LEFT JOIN order_status ON order_header_infomation.order_id = order_status.order_id ORDER BY order_header_infomation.id DESC
            ');
        }
        // Map the results to the desired format
        $customArray = array_map(function($location) {
            return [
                'id' => $location->order_id,
                'Company' => $location->company_name,
                'DriverID' => $location->driver_loginh_id,
                'Order' => $location->order_number,
                'Order_id' => $location->order_id,
                'Type' => $location->order_type,
                'ReceivedDate' => $location->date_received,
                'ReceivedTime' => $location->time_received,
                'ReadStatus' => $location->is_read,
                'Status' => $location->new_status,
            ];
        }, $result);

        $allUserData = DataTables::of($customArray)
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="View"
                class="viewOrder btn btn-info btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-eye-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents"
                class="viewOrderScans btn btn-secondary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-file-pdf-line"></i></a> ';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" title="Scanned Documents Re-send"
                class="orderScanReSend btn btn-primary btn-sm" style="padding-top:2px; padding-bottom:0px; padding-top:0px" ><i class="ri-device-recover-line"></i></a> ';
                return $btn;
            })
            ->make(true);
        return $allUserData;
        // }
        return view('order-list');
    }
}
