<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class PdfController extends Controller
{


    public function upload(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf',
        ], [
            'email.pdf' => 'Dosya boş girilemez !',

        ]);

        $fileName = 'test.pdf';

        $request->pdf->move(public_path(), $fileName);


        return redirect()->route('index')->with('success', 'Pdf değiştirildi');
    }

    public function download(Request $request)
    {
        $pdf = new \TonchikTm\PdfToHtml\Pdf('test.pdf', [
//            'pdftohtml_path' => '/usr/bin/pdftohtml',
//            'pdfinfo_path' => '/usr/bin/pdfinfo',
            'pdftohtml_path' => '/app/.apt/usr/bin/pdftohtml',
            'pdfinfo_path' => '/app/.apt/usr/bin/pdfinfo'

        ]);

// example for windows
// $pdf = new \TonchikTm\PdfToHtml\Pdf('test.pdf', [
//     'pdftohtml_path' => '/path/to/poppler/bin/pdftohtml.exe',
//     'pdfinfo_path' => '/path/to/poppler/bin/pdfinfo.exe'
// ]);

// get pdf info
        $pdfInfo = $pdf->getInfo();

// get count pages
//        $countPages = $pdf->countPages();

// get content from one page
        $contentFirstPage = $pdf->getHtml()->getPage(1);
//        preg_match("'px;\">(.*?)</div>'si", $contentFirstPage, $match);

        $bodytag = str_replace("Page 1", null, $contentFirstPage);

        preg_match("'<b>SAYIN<br></b>(.*?)<br>'si", $contentFirstPage, $match);
        $bodytag = str_replace($match[1], $request->name, $bodytag);

        $bodytag = str_replace("tonchik-tm", null, $bodytag);


        return $bodytag;

        return $bodytag;

// get content from all pages and loop for they
        foreach ($pdf->getHtml()->getAllPages() as $page) {
            echo $page . '<br/>';
        }
    }
}
