<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerificationRequest;
use App\Models\Materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Mail; // Import the Mail facade
use App\Mail\VerificationEmail; // Import the VerificationEmail Mailable
use App\Models\User; // Import the User model
use App\Models\UsersProgress;
use App\Models\Raport;



class Siswa extends Controller
{
    //index level
    public function indexlevel()
    {
        //select distinc levels
        $lastLevel = Materials::select('level')->distinct()->orderBy('level', 'desc')->first();
        $lastLevel = $lastLevel->level;
        return view('indexlevel', ['lastLevel' => $lastLevel]);
    }

    // materi
    public function materi($level){
        // select all materi where level = $level
        $materies = Materials::where('level', $level)->get();
        return view('belajar', compact('materies'));
    }
    //return view bermain
    public function bermain()
    {
        return view('bermain');
    }

    public function sendVerif(Request $request)
    {
        // check email = role ortu in database
        if (!User::where('email', $request->email)->where('role', 'ortu')->exists()) {
            return back()->with('error', 'Email tidak terdaftar!');
        }
        $email = $request->email;

        $verificationCode = rand(100000, 999999);
        
        User::where('name', auth()->user()->name)->update(['verification_code' => $verificationCode]);

        Mail::to($email)->send(new EmailVerificationRequest($verificationCode));

        // Return a response indicating that the verification email has been sent
        return back()->with('success', 'Verification email has been sent. Please check your email for further instructions.');
    }
    public function verify($code, $email)
    {
        // Find the user by the verification code
        $user = User::where('verification_code', $code)->first();

        if ($user) {
            $user->email_verified_at = now();
            $user->verification_code = null;
            $user->save();

            // Update user email field with the passed email value
            $user->update(['email' => $email]);

            // Redirect profile page with a success message
            return(redirect()->route('profile')->with('success', 'Email verified successfully!'));
        } else {
            // Redirect to profile page with an error message
            return(redirect()->route('profile')->with('error', 'Invalid verification code!'));
        }
    }

    // delete email
    public function deleteEmail()
    {
        // delete user email
        User::where('name', auth()->user()->name)->update(['email' => null]);
        // also delete verification date
        User::where('name', auth()->user()->name)->update(['email_verified_at' => null]);
        // Redirect to profile page with an error message
        return(redirect()->route('profile')->with('status', 'Email deleted successfully!'));
    }


    // update raport
    public function storeRaport(Request $request){
        $nama = $request->nama;
        $catatan = $request->catatan;
        $guru = $request->guru_pendamping;
        $materi = $request->materi_kesukaan;
        $Raport = Raport::where('nama', $nama)->first();
        // if null insert is not null update
        if ($Raport){
            $Raport->update([
                'catatan' => $catatan,
                'guru_pendamping' => $guru,
                'materi_favorit' => $materi
        ]);
        } else {
            // If the Raport record doesn't exist, create a new one
            Raport::create([
                'nama' => $nama,
                'catatan' => $catatan,
                'guru_pendamping' => $guru,
                'materi_favorit' => $materi
            ]);
        }
        return redirect()->back()->with('success', 'Raport berhasil diupdate!');
    }

}
