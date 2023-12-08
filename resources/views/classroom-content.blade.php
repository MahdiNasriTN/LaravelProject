<div class="classroomNotesContainer">
    <div class="classroom-name-note">
        <div class="classroom-name-content">
            <div class="classroom-fletter marg-class">
                {{ strtoupper(substr($selectedClassroom->classname, 0, 1)) }}
            </div>
            <div class="classroom-title-subject">
                <p class="classroom-title p-remove">{{$selectedClassroom->classname}}</p>
                <p class="classroom-subject p-remove">{{$selectedClassroom->classsubject}}</p>
            </div>
        </div>
        <div class="classroom-code">
            <p class="classroom-classcode">Class code</p>
            <p class="classroom-thecode">{{$selectedClassroom->codeClass}}</p>
        </div>
        <form class="classroom-form-inputs" action="{{ route('classroom.addNote', ['classroomId' => $selectedClassroom->id]) }}" method="POST">
            @csrf
                <div class="classroom-note-content">
                    <div class="classroom-note-content-inside">
                        <div class="classroom-title-input">
                            <input type="text" class="classroom-inputs form-control" placeholder="Title" name="title">
                        </div>
                        <div class="classroom-note-input">
                            <input type="text" class="classroom-inputs form-control" placeholder="Note" name="description">
                        </div>
                    </div>
                    <div class="classroom-Add-Button">
                        <button class="btn addNoteButton" type="submit">Add Note</button>
                    </div>
                </div>
        </form>
    </div>
    <div class="classroom-shownote">
        @foreach($notes as $note)
        <div class="classroom-notes-cart">
            <div class="classroom-note-title">{{$note->title}}</div>
            <div class="classroom-note-description">{{$note->description}}</div>
            @if($note->authId == $userInfo['id'])
                <div class="threeDots dropdown classroom-dots" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"></path></svg>
                    <ul class="classroomDropdown dropdown-menu">
                        <li><a class=" classroom-item dropdown-item" onclick="openNoteEditModal({{ $note->id }})">Edit</a></li>
                        <li>
                            <form id="deleteForm{{ $note->id }}" action="{{ route('classroom.destroynote', ['noteId' => $note->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="classroom-item dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('deleteForm{{ $note->id }}').submit();">Delete</a>
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
            @include('editnotemodal',['note' =>$note])
        </div>
        @endforeach
    </div>
</div>