<?php

namespace App\Http\Controllers;

use App\Models\Admin\mail;
use App\Models\All\All;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Psr\Log\alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $auth = Auth::user();
        if(isset($auth))

        if ($auth->role == 'Admin') {
            $get_all_gents = All::where('gender', 'male')->count();
            $get_all_ladies = All::where('gender', 'female')->count();
            return view('home', compact('get_all_gents', 'get_all_ladies'));

        }

        else {
            $first_record = All::get()->first();
            $all_record = All::get();
            $randoms= All:: inRandomOrder()->get();
            $randoms1= All:: inRandomOrder()->get();
            $randoms2= All:: inRandomOrder()->get();
            $randoms3= All:: inRandomOrder()->get();

            $get_all_gents = All::where('gender', 'male')->get();
            $get_single_gents = All::where('gender', 'male')->first();
            $get_all_ladies = All::where('gender', 'female')->get();
            $get_single_ladies = All::where('gender', 'female')->first();
            $get_single_childs = All::where('gender', 'child')->first();
            return view('User.user_dashboard', compact('get_all_gents', 'get_all_ladies', 'all_record', 'get_single_gents', 'get_single_ladies', 'get_single_childs','randoms','randoms1','randoms2','randoms3','first_record'));
        }

    }
    public function sendmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $data = $request->all();
        mail::create($data);

        return back()->with(['success' => 'Mail Send SuccessFully']);
    }

    public function front_index()
    {
        return view('welcome');
    }
    public function shop_view()
    {
        $all_record = All::paginate(6);
        return view('User.shop', compact('all_record'));
    }

    public function contact_view()
    {
        return view('User.contact');
    }

    public function get_gents()
    {
        $get_all_gents = All::where('gender', 'male')->paginate(6);
        return view('User.front_show_gents', compact('get_all_gents'));
    }

    public function get_womens()
    {
        $get_all_womens = All::where('gender', 'female')->paginate(6);
        return view('User.front_show_womens', compact('get_all_womens'));
    }

    public function get_childs()
    {
        $get_all_childs = All::where('gender', 'child')->paginate(6);
        return view('User.front_show_childs', compact('get_all_childs'));
    }

    public function get_shirts()
    {
        $get_all_shirts = All::where('category', 'Shirts')->paginate(6);
        return view('User.front_show_shirts', compact('get_all_shirts'));
    }

    public function get_jeans()
    {
        $get_all_jeans = All::where('category', 'Jeans')->paginate(6);
        return view('User.front_show_jeans', compact('get_all_jeans'));
    }
    public function view_details($id)
    {
        $get_single_record = All::find($id);
        $all_record_gets = All::get();
        return view('User.detail',compact('get_single_record','all_record_gets'));
    }
    public function add_cart($id)
    {
        $get_cart_record = All::find($id);
        return view('User.cart',compact('get_cart_record'));
    }
    public function checkout_process($id)
    {
        return view('User.checkout');
    }
    public function search(Request $request)
    {
        $search = $request['search'];
        $products = All::where('product_name','LIKE','%'.$search.'%')->orwhere('gender','LIKE','%'.$search.'%')->orwhere('category','LIKE','%'.$search.'%')->get();
        return view('User.search',compact('products'));

    }
    public function click_details($id)
    {
        $products = All::find($id)->increment('product_inc');
        return redirect()->route('view_details',$id);
    }

    public function likePost(Request $request)
    {

        $post =  All::find($request->id);
        $post->update(["Likes"=>$post->Likes++]);

        return response()->json($post);
    }

    public function unlikePost(Request $request)
    {

        $post =  All::find($request->id);
        $post->update(["Unlikes"=>$post->Unlikes++]);

        return response()->json($post);
    }

}
