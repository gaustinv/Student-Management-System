<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

/*
 * Global helpers file with misc functions.
 */
if (! function_exists('createDataBase')) {
    /**
     * Helper to create data base.
     *
     * @return mixed
     */
    function createDataBase($field_dates)
    {

      
      
      // for recipe
      foreach ($field_dates as $field) {
        $newdata =  [];
        $newdata =  array (
            'name' => trim($field),
            'type' => 'float'
          );
        $fields[] = $newdata;
      }
    //   dd($fields);
       // check if table is not already exists
       $table_name="emi_details";
       if (!Schema::hasTable($table_name)) {
        Schema::create($table_name, function (Blueprint $table) use ($fields, $table_name) {
            $table->increments('id');
            $table->integer('client_id');
            if (count($fields) > 0) {
                foreach ($fields as $field) {
                    $table->{$field['type']}($field['name'])->nullable();;
                }
            }
            $table->timestamps();
        });

        return 'success';
    }

        return 'faild';
    }

    /**
     * To delete the tabel from the database 
     * 
     * @param $table_name
     *
     * @return bool
     */
    if (! function_exists('removeTable')) {

        function removeTable()
        {
  
            $table_name='emi_details';
            Schema::dropIfExists($table_name); 
            
            return true;
        }
    }

    function dateFields($start, $end)
    {
      
        $output = [];
        $time   = strtotime($start);
        $last   = date('Y_M', strtotime($end));

        do {
        $month = date('Y_M', $time);
        $total = date('t', $time);

        $output[] = $month;

        $time = strtotime('+1 month', $time);
        } while ($month != $last);

        implode(",", $output);

        return $output;

    }
}

