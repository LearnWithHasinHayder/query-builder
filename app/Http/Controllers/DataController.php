<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Book;
use App\Models\Author;


class DataController extends Controller {
    function getData() {
        $invoices = Invoice::limit(5)->get();

        //paid invoices
        $invoices = Invoice::where('paid',1)->get();
        // $invoices = Invoice::wherePaid(1)->get();
        // $invoices = Invoice::whereTotalPrice(792.67)->get();
        $invoice = Invoice::find(1);
        return $invoice;

        // $newInvoiceItem = new InvoiceItem();
        // $newInvoiceItem->invoice_id = 1;
        // $newInvoiceItem->title = "Item Y";
        // $newInvoiceItem->total_price = 200;
        // $newInvoiceItem->save();
        // $invoice->items()->save($newInvoiceItem);


        // $invoice->client = "Kyra Robel II";
        // $invoice->save();

        // $newInvoice = new Invoice();
        // $newInvoice->client = "Kyra Robel II";
        // $newInvoice->paid = 1;
        // $newInvoice->total_price = 792.67;
        // $newInvoice->save();

        //paid invoices and price > 1000
        // $invoices = Invoice::where('paid',1)->where('total_price','<',1000)->get();
        // return $invoices;
        //total price of paid invoice
        // $price = Invoice::where('paid',1)->sum('total_price');
        // $invoiceItems = $invoice->items()->first();

        // $invoiceItem = InvoiceItem::find(1);
        // $invoiceItem = InvoiceItem::with('invoice')->find(1);
        // return $invoice;
    }



    function getBooks(){
        //create a new book and attach to an author
        // $author = Author::with('books')->find(2);
        // return $author;

        $book = Book::with('authors')->find(2);
        $author = Author::find(5);
        // $book->authors()->attach($author);
        return $book;
    }

    function getInvoice($id){
        $invoice = Invoice::findOrFail($id);
        return $invoice;
        // return $invoice->total_price;
    }

    function createBook(){
        // $book = new Book();
        // $book->title = "Book X";
        // $book->save();
        $book = Book::create([
            'title' => 'Book Y'
        ]);
        return $book;
    }
}
