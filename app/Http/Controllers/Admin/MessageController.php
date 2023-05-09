<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\EmailHelper;
use App\Models\BulkMessages;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function userMessage()
    {
        try {
            $sentMessages = Messages::with(['receiver'])
                ->where('sender_id', Auth::user()->id)
                ->orderBy('created_at', 'DESC')
                ->get();

            $receivedMessages = Messages::with(['sender'])
                ->where('receiver_id', Auth::user()->id)
                ->orderBy('created_at', 'DESC')
                ->get();
            return view('admin.user_message', compact(['sentMessages', 'receivedMessages']));
        } catch (\Exception $exception) {
            logger('Messages Error ' . $exception->getMessage());
        }
    }

    public function readMessage($id)
    {
        try {
            $message = Messages::where('id', $id)
                ->where('is_read', 0)
                ->first();

            if ($message) {
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
        } catch (\Exception $exception) {
            logger('Read Messages Error ' . $exception->getMessage());
        }
    }

    public function handleBulkMessage(Request $request)
    {
        try {
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

                    $body = 'New message sent from ' . Auth::user()->full_name . ' Check your inbox to see message';
                    $subject = 'Message Notification';

                    $user = User::find($id);

                    if ($user->role_id == 777) {
                        $route = route('field.admin.messages');
                    } elseif ($user->role_id == 779) {
                        $route = route('field.worker.messages');
                    } elseif ($user->role_id == 889) {
                        $route = route('operator.profile.messages');
                    } elseif ($user->role_id == 999) {
                        $route = route('admin.messages');
                    }
                    EmailHelper::send($user, $subject, $body, true, 'Show Inbox', $route);
                endif;
            }

            return back()->with('success', 'Bulk Message Sent Successfully');
        } catch (\Exception $exception) {
            logger('Bulk Messages Error ' . $exception->getMessage());
        }
    }

    public function handleSingleMessage(Request $request)
    {
        try {
            $user = json_decode($request->user);

            $message = new Messages();
            $message->sender_id = Auth::user()->id;
            $message->receiver_id = $user->id;
            $message->title = $request->single_subject;
            $message->message = $request->single_body;
            $message->is_bulk = 0;
            $message->bulk_id = null;
            $message->save();

            $body = 'New message sent from ' . Auth::user()->full_name . ' Check your inbox to see message';
            $subject = 'Message Notification';

            if ($user->role_id == 777) {
                $route = route('field.admin.messages');
            } elseif ($user->role_id == 779) {
                $route = route('field.worker.messages');
            } elseif ($user->role_id == 889) {
                $route = route('operator.profile.messages');
            } elseif ($user->role_id == 999) {
                $route = route('admin.messages');
            }

            EmailHelper::send(User::find($user->id), $subject, $body, true, 'Show Inbox', $route);

            $fullName = $user->first_name . ' ' . $user->last_name;
            return back()->with('success', "Message sent to $fullName successfully.");
        } catch (\Exception $exception) {
            logger('Single Messages Error ' . $exception->getMessage());
        }
    }
}
