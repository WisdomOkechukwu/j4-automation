@extends('partials.app')
@section('content')
    <div class="card mb-4">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">My Messages</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#inbox" role="tab"
                                aria-controls="profile" aria-selected="false">
                                Inbox({{ $receivedMessages->count() }})</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#sent" role="tab"
                                aria-controls="home" aria-selected="true">Sent({{ $sentMessages->count() }})</a>
                        </li>

                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade mt-4" id="sent" role="tabpanel" aria-labelledby="home-tab">
                            @foreach ($sentMessages as $message)
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <div class="accordion-button bg-light shadow" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#sent-{{ $message->id }}"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                <div class="pr-50 m-4 mt-0 mb-0 ml-0">
                                                    <div class="avatar">
                                                        @if ($message->receiver->dp)
                                                            <img src="{{ asset('storage/upload/' . $message->receiver->dp) }}"
                                                                id="user-avatar" alt="user-avatar" class="d-block rounded"
                                                                height="100" width="100" id="uploadedAvatar" />
                                                        @else
                                                            <img src="https://ui-avatars.com/api/?name={{ $message->receiver->full_name }}"
                                                                id="user-avatar" alt="user-avatar" class="d-block rounded"
                                                                height="100" width="100" id="uploadedAvatar" />
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="user-details">
                                                        <div class="mail-items">
                                                            <h5 class="list-group-item-text text-truncate">
                                                                {{ $message->receiver->full_name }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="mail-message">
                                                        <p class="list-group-item-text truncate mb-0 h6">
                                                            {{ $message->title }}
                                                            <br>{{ $message->created_at->format('d M, h:ia') }}
                                                        </p>
                                                        <div class="mail-meta-item">
                                                            <span class="float-right">
                                                                <span class="bullet bullet-success bullet-sm"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </h2>
                                    <div id="sent-{{ $message->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{ $message->message }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="tab-pane fade show active mt-4" id="inbox" role="tabpanel"
                            aria-labelledby="home-tab">
                            @foreach ($receivedMessages as $message)
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <div class="accordion-button bg-light shadow" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#inbox-{{ $message->id }}"
                                                aria-expanded="true" aria-controls="collapseOne"
                                                @if ($message->is_read == 0) onclick = "setReadMessageData({{ $message->id }})" @endif>
                                                <div class="pr-50 m-4 mt-0 mb-0 ml-0">
                                                    <div class="avatar">
                                                        @if ($message->sender->dp)
                                                            <img src="{{ asset('storage/upload/' . $message->sender->dp) }}"
                                                                id="user-avatar" alt="user-avatar" class="d-block rounded"
                                                                height="100" width="100" id="uploadedAvatar" />
                                                        @else
                                                            <img src="https://ui-avatars.com/api/?name={{ $message->sender->full_name }}"
                                                                id="user-avatar" alt="user-avatar" class="d-block rounded"
                                                                height="100" width="100" id="uploadedAvatar" />
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="user-details">
                                                        <div class="mail-items">
                                                            <h5 class="list-group-item-text text-truncate">
                                                                {{ $message->sender->full_name }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="mail-message">
                                                        <p class="list-group-item-text truncate mb-0 h6">
                                                            {{ $message->title }}
                                                            <br>{{ $message->created_at->format('d M, h:ia') }}
                                                            <br>
                                                            @if ($message->is_read == 0)
                                                                <span id="new-message-tag-{{ $message->id }}"
                                                                    class="badge bg-danger">New</span>
                                                            @endif
                                                        </p>
                                                        <div class="mail-meta-item">
                                                            <span class="float-right">
                                                                <span class="bullet bullet-success bullet-sm"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </h2>
                                    <div id="inbox-{{ $message->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{ $message->message }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="profile-tab">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /Account -->
    </div>
@endsection
