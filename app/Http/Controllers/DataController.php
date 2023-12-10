<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class DataController extends Controller {
    function getData() {
        $invoices = DB::table('invoices')->get();

        //first item
        $invoices = DB::table('invoices')->first();
        //2nd item
        $invoices = DB::table('invoices')->where('id', 2)->first();

        //first 3 items
        $invoices = DB::table('invoices')->limit(3)->get();

        //user id = 11, paid = 1
        $invoices = DB::table('invoices')->where('user_id', 11)->where('paid', 1)->get();

        //how many paid invoice
        // $invoices = DB::table('invoices')->where('paid', 1)->count();

        //select id, user_id, paid, client
        $invoices = DB::table('invoices')
            ->select('id', 'user_id', 'paid', 'client', 'total_price')
            ->where('paid', 1)
            ->get();

            //user id 11 maximum total _price
        $max = DB::table('invoices')
            ->where('user_id', 11)
            ->where('paid', 1)
            ->max('total_price');

        //find invoice with max total_price
        $invoices = DB::table('invoices')
            ->where('total_price', $max)
            ->first();

        $invoices = DB::table('invoices')->get();

        $invoices = DB::table('invoices')->where('user_id', 11)->where('paid', 1)->sum('total_price');

        //SELECT id, client, total_price FROM invoices JOIN invoice_items ON invoices.id = invoice_items.invoice_id WHERE invoices.id = 1

        $invoices = DB::table('invoices')
            ->join('invoice_items', 'invoices.id', '=', 'invoice_items.invoice_id')
            ->select('invoice_items.id as item_id','invoices.id', 'invoices.client', 'invoices.total_price', 'invoice_items.title', 'invoice_items.total_price as item_total_price')
            ->where('invoices.id', 9)
            ->get();

        //raw query
        $invoices = DB::select('SELECT  client, total_price FROM invoices WHERE id = ?', [9]);

        //update
        // $invoices = DB::table('invoices')
        //     ->where('id', 9)
        //     ->update(['client' => 'Allene Yundt I Jr.']);

        //delete
        // $invoices = DB::table('invoices')
        //     ->where('id', 9)
        //     ->delete();

        $invoices = DB::table('invoices')->limit(3)->offset(3)->get();
        return $invoices;
    }

    function getInvoices() {
        return view('invoices');
    }
}
