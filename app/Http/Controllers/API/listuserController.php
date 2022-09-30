<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Models\Models\listModel;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class listuserController extends BaseController
{
public function list()
{
    $entries = listModel::all();

    return $this->sendResponse(ProductResource::collection($entries), 'Entries retrieved successfully.');
}
public function listGenerate(Request $request)
{
    $input = $request->all();

    $validator = Validator::make($input, [
        'fio' => 'required',
        'email' => 'required|email',
        'number' => 'required',
    ]);

    if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
    }

    $entry = listModel::create($input);
    
    $fio = listModel::orderBy('id','desc')->value('fio');
    $idlast = listModel::orderBy('id','desc')->value('id');
    $idmatch = listModel::where('fio', '=', $fio)->value('id');

    if ( $idlast != $idmatch) {
        listModel::where('id', $idlast)->delete(); 
        return response()->json(['error'=> true, 'message'=> 'fio occupied']);
       }
       //to json
        include 'toJson.php';
       //to excel
        include 'toExcel.php';
                                    
    return $this->sendResponse(new ProductResource($entry), 'Entry created successfully.');
} 
public function destroy()
{
    listModel::where('id','>', 0)->truncate();

       //to json
       include 'toJson.php';
       //to excel
        include 'toExcel.php';

    return $this->sendResponse([], 'Entry deleted successfully.');
}
public function delete($id)
{
    $entry = listModel::find($id);
    
    if ( is_null($entry)) {
        return response()->json(['error'=> true, 'message'=> 'not found']);
    }
    $entry -> delete();

       //to json
        include 'toJson.php';
       //to excel
        include 'toExcel.php';
        
    return $this->sendResponse([], 'Entry deleted successfully.');
}
}
?>