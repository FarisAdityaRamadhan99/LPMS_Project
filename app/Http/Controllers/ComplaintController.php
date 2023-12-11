<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Agency;
use App\Models\Region;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\Comment;
use App\Models\Feedback;
use Auth;
use Session;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category   =   Category::all();
        $complaint  =   Complaint::with('user')->where('id_user', Auth::user()->id)->get();
        return view('Users.Complaint.index', ['title' => 'LPMS'], compact('complaint', 'category'));
    }

    public function list()
    {
        $complaint  =   Complaint::with('user', 'agency', 'category', 'region')->get();
        return view('Users.Complaint.list', ['title' => 'LPMS'], compact('complaint'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users      =   User::select('id', 'nik')->get();
        $agency     =   Agency::select('id', 'name')->get();
        $category   =   Category::select('id', 'name')->get();
        $region     =   Region::select('id', 'name')->get();

        return view('Users.Complaint.create', ['title'  =>  'Layanan LPMS'], compact(
            'users', 'agency', 'category', 'region', 'region'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $image_name = str_split(md5($image), 20);
        $ext = $image->getClientOriginalExtension();
        $image->move("images",  $image_name[0].".".$ext);
        $id = auth()->id();

        $complaint['excerpt']  =   Str::limit(strip_tags($request->complaint), 50, '...');

        $complaint = Complaint::create([
                'id_user'           => $id,
                'title_complaint'   => $request->title_complaint,
                'complaint'         => $request->complaint,
                'id_agency'         => $request->id_agency,
                'id_category'       => $request->id_category,
                'id_region'         => $request->id_region,
                'location'          => $request->location,
                'longitude'         => $request->longitude,
                'latitude'          => $request->latitude,
                'image'             => $image_name[0].".".$ext,
            ]);
        
        if($complaint){
            return redirect()->route('beranda')->with(['success' => 'Data berhasil ditambahkan']);
        }else{
            return redirect()->route('beranda')->with(['error' => 'Data gagal ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment    =   Comment::where('id_complaint', $id)->get()->all();
        $complaint  =   Complaint::with('user')->findOrFail($id);
        return view('Users.Complaint.show', ['title' => 'LPMS'], compact('complaint', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $complaint  =   Complaint::findOrFail($id);

        return view('admin.pages.complaint.edit', compact('complaint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('complaint')->where('id', $id)->update([
            'status'  => $request->status,   
        ]);

        $complaint = Complaint::where('id', $id)->get()->all();
        foreach($complaint as $row)
        {
            $feedbacks = Feedback::where('id_complaint', $id)->get()->all();
            if($feedbacks != null)
            {
                $feedback = Feedback::find(['id_complaint'=>$id]);
                foreach($feedback as $row)
                {
                    $row->update([
                        'name'=>$request->name
                    ]);
                }
            }else{
                $feedback = Feedback::create([
                    'id_complaint'=>$id,
                    'id_agency'=>$row->id_agency,
                    'name'=>$request->name
                ]);
            }
        }

        return redirect()->route('admin.complaint')->with('success', 'Status aduan berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
