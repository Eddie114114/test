<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chatModel;

class chatController extends Controller
{
    public function index (){
        $chats = chatModel::select(
            'id',
            'title',
            'content',
            'created_at',
        )
            ->orderBy('created_at', 'DESC')
            ->get();
    
            return view('chatBoard', compact('chats'));
    }

    public function store(Request $request){
        if ($request->title) {
            // 如果標題存在，則進行更新
            $chat = chatModel::where('title', $request->title)->first();// 使用 where 條件查找標題符合的留言
            if ($chat) {
                $chat->content = $request->content;
                $chat->save();
                return redirect()->route('chatBoard')->with('success', '留言已成功更新！');
            }
        }

        // 標題不存在，進行新增
        $chat = new chatModel();// 創建一條新的留言
        $chat->title = $request->title;
        $chat->content = $request->content;// 創建一條新的留言

        $chat->save();// 儲存留言到資料庫
        return redirect()->route('chatBoard')->with('success', '留言已成功發表！');// 重定向回聊天板首頁或其他適當的地方
    }

    public function destroy(Request $request){
        // 從請求中獲取要刪除的留言標題
        $title = $request->input('title');
        $chats = chatModel::where('title', $title)->get();
        foreach ($chats as $chat) {
            $chat->delete();
        }
        return redirect()->route('chatBoard')->with('success', '留言已成功刪除！');
    }
}