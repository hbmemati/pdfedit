<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function index(Request $request)
    {
        $pdf = new \TonchikTm\PdfToHtml\Pdf('test.pdf', [
            'pdftohtml_path' => '/usr/bin/pdftohtml',
            'pdfinfo_path' => '/usr/bin/pdfinfo'
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
        $bodytag = str_replace($match[1], $request->isim, $bodytag);
        return $bodytag;

// get content from all pages and loop for they
        foreach ($pdf->getHtml()->getAllPages() as $page) {
            echo $page . '<br/>';
        }
    }
}
