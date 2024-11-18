<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order_doc_scan;

use Illuminate\Support\Facades\Storage;

use DB;
use DataTables;

class OrderDocScan extends Controller
{
    //get selectd order scan documents
    public function get_order_related_docs($order_id)
    {
        $files = [];
        $all_scan_docs = order_doc_scan::where('order_id',$order_id)->get();
        // dd($all_scan_docs);
        foreach ($all_scan_docs as $doc) {
            $filePath = 'app/public/' . $doc->file_name; // assuming 'file_path' is the column name that stores the file path in the storage directory

            // dd($filePath);
            // dd(storage_path($filePath));

            if (storage_path($filePath)) {
                $files[] = [
                    'id' => $doc->id,
                    'File_path' => Storage::url($filePath),
                    'File_name' => $doc->file_name,
                ];

            } else {
                echo "File does not exist: " . $filePath . "\n";
            }
        }

        // dd($file);
        $all_scan_docs_count = order_doc_scan::where('order_id',$order_id)->count();



        return response()->json(["success"=>true, "data"=>$files, "count"=>$all_scan_docs_count]);
    }

    



}
