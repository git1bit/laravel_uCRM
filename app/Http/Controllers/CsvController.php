<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\StreamedResponse;

class CsvController extends Controller
{
    /**
     * Export Sample List with csv
     * @return Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download( Request $request )
    {
        $cvsList = [
             ['タイトル', '本文', '名前']
             , ['テストタイトル１', 'テスト本文１', 'テスト１']
             , ['テストタイトル２', 'テスト本文２', 'テスト２']
        ];
        $response = new StreamedResponse (function() use ($request, $cvsList){
            $stream = fopen('php://output', 'w');

            //　文字化け回避
            stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');

            // CSVデータ
            foreach($cvsList as $key => $value) {
                fputcsv($stream, $value);
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="sample.csv"');
 
        return $response;
    }
}