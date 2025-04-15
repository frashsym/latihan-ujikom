<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $bulanSekarang = now()->format('F'); // Contoh: "April"

        $query = Pembayaran::with(['user', 'siswa', 'spp']);

        if (Auth::check()) {
            if ($request->filled('bulan')) {
                $query->where('bulan_bayar', $request->bulan);
            }
        } else {
            $query->where('bulan_bayar', $bulanSekarang);
        }

        $pembayaran = $query->paginate(5);

        $user = User::all();
        $siswa = Siswa::all();
        $spp = Spp::all();

        return view('index', compact('pembayaran', 'user', 'siswa', 'spp'));
    }
}
