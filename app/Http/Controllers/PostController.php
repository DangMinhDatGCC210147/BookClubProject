<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostLike;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.createPost');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'idSt' => 'required',
        'nameSt' => 'required',
        'email' => 'required|email',
        'submission_date' => 'required|date',
    ]);

    $imageName = null;

    if ($request->hasFile('image')) {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
        ]);

        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/posts'), $imageName);
    }

    $post = Post::create([
        'name' => $request->name,
        'nameSt' => $request->nameSt,
        'idSt' => $request->idSt,
        'image' => $imageName ? 'images/posts/' . $imageName : null,
        'email' => $request->email,
        'link' => $request->link,
        'description_1' => $request->description_1,
        'description_2' => $request->description_2,
        'submission_date' => $request->submission_date,
    ]);

    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.createPost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $date = Carbon::createFromFormat('Y-m-d', $request->input('submission_date'));
        $request->validate([
            'nameSt' => 'required',
            'idSt' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
            'email' => 'required|email',
            'submission_date' => 'required|date',
        ]);
        
        // Lưu tập tin vào thư mục public/images nếu có sự thay đổi
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/posts'), $imageName);

            // Xoá hình ảnh cũ
            if ($post->image) {
                unlink(public_path($post->image));
            }

            // Cập nhật đường dẫn hình ảnh trong trường 'image'
            $post->update(['image' => 'images/posts/' . $imageName]);
        }
        // Cập nhật thông tin sự kiện
        $post->update([
            'name' => $request->input('name'),
            'nameSt' => $request->input('nameSt'),
            'idSt' => $request->input('idSt'),
            'link' => $request->input('link'),
            'date' =>  $date,
            'email' => $request->input('email'),
            'description_1' => $request->input('description_1'),
            'description_2' => $request->input('description_2'),
            'status' => $request->input('status')
        ]);

        return redirect()->route('posts.index')->with('success', 'Post is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('success', 'Post is deleted successfully.');
    }

    public function postdetail($id)
    {
        $post = Post::find($id);
    
        return view('postdetail', compact('post'));
    }
    

    public function toggleLike($postId)
    {
        $userIp = request()->ip();
        $like = PostLike::where('post_id', $postId)->where('user_ip', $userIp)->first();
    
        if ($like) {
            // Người dùng đã "tim", hãy bỏ "tim"
            $like->delete();
        } else {
            // Người dùng chưa "tim", hãy "tim"
            PostLike::create(['post_id' => $postId, 'user_ip' => $userIp]);
        }
    
        // Chuyển hướng người dùng trở lại trang chi tiết bài viết sau khi xử lý
        return redirect()->back();
    }    
}
