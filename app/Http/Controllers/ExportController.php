<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Http\Services\AccService;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    protected $AccService;
    public function __construct(AccService $AccService,)
    {
        $this->AccService = $AccService;
    }
    public function exportPDF()
    {
        $options = new Options();
        $options->set('defaultFont', public_path('fonts/Roboto-ThinItalic.ttf'));
        $posts = User::where('role_id', 2)->get(); // Lấy dữ liệu từ model User (đảm bảo bạn đã import Model User vào controller)
        $dompdf = new Dompdf($options);
        $html = view('admin.acc.export-pdf', compact('posts'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('document.pdf', ['Attachment' => false]);
    }
    public function exportPDF1()
    {
        $options = new Options();
        $options->set('defaultFont', public_path('fonts/Roboto-ThinItalic.ttf'));
        $posts = Post::all();
        $postexchanges = $this->AccService->getsuccess();
        $dompdf = new Dompdf($options);
        $html = view('admin.acc.export-success', compact('posts', 'postexchanges'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('document.pdf', ['Attachment' => false]);
    }
    public function exportPDF2()
    {
        $options = new Options();
        $options->set('defaultFont', public_path('fonts/Roboto-ThinItalic.ttf'));
        $posts = Post::all();
        $dompdf = new Dompdf($options);
        $html = view('admin.post.export_menu', compact('posts',))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('document.pdf', ['Attachment' => false]);
    }
    public function exportPDF3()
    {
        $options = new Options();
        $options->set('defaultFont', public_path('fonts/Roboto-ThinItalic.ttf'));
        $posts = Post::all();
        $dompdf = new Dompdf($options);
        $html = view('admin.post.export_phithu', compact('posts',))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('document.pdf', ['Attachment' => false]);
    }
}
