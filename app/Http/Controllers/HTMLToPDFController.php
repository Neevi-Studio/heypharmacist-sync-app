<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spiritix\Html2Pdf\Converter;
use Spiritix\Html2Pdf\Input\StringInput;
// use Spiritix\Html2Pdf\Input\UrlInput;
use Spiritix\Html2Pdf\Output\DownloadOutput;

class HTMLToPDFController extends Controller
{
    public function convert(Request $request)
    {
        $name = $request->name ?? "download";
        $name .= ".pdf";
        $input = new StringInput();
        $input->setHtml($request->html);

        // $input = new UrlInput();
        // $input->setUrl("https://www.tutorialkart.com/nodejs/create-file-in-nodejs-using-node-fs-module/");

        $converter = new Converter($input, new DownloadOutput());

        $converter->setOptions([
            'printBackground' => true,
            'displayHeaderFooter' => false,
            'pageRanges' => "1-1",
            'format' => 'Tabloid',
        ]);

        $output = $converter->convert();
        $output->download($name);
    }
}
