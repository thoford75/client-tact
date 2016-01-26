<?php

namespace App\Http\Controllers;

use App\Bids;
use Auth;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('home');
    }

    public function update(Request $request)
    {

        $id = $request->input('id');

        $bids = Bids::find($id);

        if (!empty($bids)) {

            $bids->price = $request->input('price');
            $bids->text = $request->input('text');
            $bids->terms = $request->input('terms');
            $bids->timestamp = date('Y-m-d H:i:s');

            $bids->save();

            //email MM RATE HAS CHANGED

        } else {

            $bids = new Bids;

            $bids->quote_id = $request->input('quote_id');
            $bids->user_id = $request->input('user_id');
            $bids->price = $request->input('price');
            $bids->text = $request->input('text');
            $bids->terms = $request->input('terms');
            $bids->timestamp = date('Y-m-d H:i:s');

            $bids->save();

            //email MM RATE GIVEN

        }


        return redirect()->action('HomeController@jobs')
            ->with('status', 'Thank you. Your rate has been sent to the move manager.');


    }

    public function jobs()
    {


        $query = DB::table("dbQuotes")
            ->leftJoin("dbACT", "dbQuotes.act_id", "=", "dbACT.ID")
            ->leftJoin("dbOpps", "dbQuotes.act_id", "=", "dbOpps.contactID")
            ->leftJoin('dbBids', 'dbQuotes.act_id', '=',
                DB::raw('dbBids.quote_id AND dbBids.user_id = '. Auth::user()->id))
            ->where("dbQuotes.active", "=", "1")
            ->select("dbQuotes.*", "dbACT.*", "dbBids.*",
                (DB::raw('date_format(dbQuotes.posted_date, "%d/%m/%Y %H:%i") as posted_date')),
                (DB::raw('date_format(dbOpps.expected_date, "%d/%m/%Y") as expected_date')))
            ->groupBy("dbQuotes.id")
            ->orderBy("posted_date", "desc")
            ->get();

        $act_id = DB::table('dbQuotes')->lists('act_id');

        $bids = DB::table("dbBids")
            ->whereIn("quote_id", $act_id)
            ->get();


        return view('jobs', ['query' => $query, 'bids' => $bids]);

    }

    public function history()
    {

        $history = DB::table("dbBids")
            ->leftJoin("dbACT", "dbBids.quote_id", "=", "dbACT.ID")
            ->leftJoin("dbOpps", "dbBids.quote_id", "=", "dbOpps.contactID")
            ->leftjoin('dbQuotes', 'dbBids.quote_id','=', 'dbQuotes.act_id')
            ->where("dbQuotes.active", "=", "1")
            ->where("dbBids.user_id", "=", Auth::user()->id)
            ->select("dbQuotes.*", "dbACT.*", "dbBids.*",
                (DB::raw('date_format(dbBids.timestamp, "%d/%m/%Y %H:%i") as timestamp')),
                (DB::raw('date_format(dbQuotes.posted_date, "%d/%m/%Y %H:%i") as posted_date')),
                (DB::raw('date_format(dbOpps.expected_date, "%d/%m/%Y") as expected_date')))
            ->groupBy("dbQuotes.id")
            ->orderBy("timestamp", "desc")
            ->get();

        return view('history', ['history' => $history]);

    }


}
