<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BulkMessages;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function userMessage()
    {
        $sentMessages = Messages::with(['receiver'])
            ->where('sender_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $receivedMessages = Messages::with(['sender'])
            ->where('receiver_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.user_message', compact(['sentMessages', 'receivedMessages']));
    }

    public function readMessage($id)
    {
        $message = Messages::where('id', $id)
            ->where('is_read', 0)
            ->first();

        if($message){
            $message->update([
                'is_read' => 1,
            ]);

            return response()->json([
                'success' => true,
            ]);
        }
        return response()->json([
            'success' => false,
        ]);
    }

    public function handleBulkMessage(Request $request)
    {
        $bulkUsers = $request->except('_token', 'bulk_message', 'bulk_subject');
        $usersArray = array_keys($bulkUsers);

        $bulkMessages = new BulkMessages();
        $bulkMessages->sender_id = Auth::user()->id;
        $bulkMessages->receiver_id = json_encode($usersArray);
        $bulkMessages->title = $request->bulk_subject;
        $bulkMessages->message = $request->bulk_message;
        $bulkMessages->save();

        foreach ($bulkUsers as $id => $is_send) {
            if ($is_send == 'on'):
                $message = new Messages();
                $message->sender_id = Auth::user()->id;
                $message->receiver_id = $id;
                $message->title = $request->bulk_subject;
                $message->message = $request->bulk_message;
                $message->is_bulk = 1;
                $message->bulk_id = $bulkMessages->id;
                $message->save();
            endif;
        }

        return back()->with('success', 'Bulk Message Sent Successfully');
    }

    public function handleSingleMessage(Request $request)
    {
        $user = json_decode($request->user);

        $message = new Messages();
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $user->id;
        $message->title = $request->single_subject;
        $message->message = $request->single_body;
        $message->is_bulk = 0;
        $message->bulk_id = null;
        $message->save();

        $fullName = $user->first_name . ' ' . $user->last_name;
        return back()->with('success', "Message sent to $fullName successfully.");
    }
}
