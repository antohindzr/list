<?php
use App\Models\Models\listModel;
     
       $entries = listModel::all();
       $tojson = fopen('listuserto.json', 'w');
       fwrite($tojson, json_encode($entries));
       fclose($tojson);