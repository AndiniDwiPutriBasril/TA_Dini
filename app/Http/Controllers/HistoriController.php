<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitoring;

class HistoriController extends Controller
{
    public function index()
    {
        $data = Monitoring::latest()->paginate(10);

        return view('histori', compact('data'));;
    }

    public function destroy($id)
    {
    Monitoring::findOrFail($id)->delete();

    return redirect()->back()
        ->with('success', 'Data berhasil dihapus');
    }
}
