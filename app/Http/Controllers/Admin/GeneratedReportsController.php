<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class GeneratedReportsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('generated_report_access')) {
            return abort(401);
        }
        return view('admin.generated_reports.index');
    }
}
