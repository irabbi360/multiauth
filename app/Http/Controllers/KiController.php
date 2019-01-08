<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use File;
use PDO;

class KiController extends Controller
{
    public function dbCon()
    {
        // Test database connection
        try{
            $dbh = new pdo( 'mysql:host=127.0.0.1:3306;dbname=booking',
                'root',
                '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            die(json_encode(array(true)));
        }
        catch(\PDOException $ex){
            die(json_encode(array(false)));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function fileCopy()
    {
        return view('ki');
    }

    public function fileUpgrading()
    {
        $oldPath = '../v-2.0/app/Models/Ki.php';
        $newPath = '../app/Models/Ki.php';

        if (\File::copy($oldPath , $newPath)) {

            Session::flash('message', 'File successfully copy!'); ;

        } else{

            Session::flash('message', 'File copy field !!!');
        }

        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = File::get(storage_path('../v-2.0/app/Database/testdb.sql'));
        //$connections = DB::connection()->getConfig("database");
        //dd($connections);
        //$data = $connections->statement($file);

        //$data = DB::connection()->getPdo()->query($file);

        if ($data = DB::connection()->getPdo()->query($file)){
            Session::flash('message', 'Database successfully inserted');
        } else{
            Session::flash('message', 'Database field to inserted');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
