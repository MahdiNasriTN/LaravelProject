
        <div class="classroomContainer">
            <div class="firstsection">
                <a href="{{ route('classroom.showClassroom', ['classroomId' => $classroom->id]) }}">
                    <div class="classroomName"><p>{{$classroom->classname}}</p></div>
                </a>
                <div class="threeDots dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg></div>
                        @if($classroom->authorId == $userInfo['id'])
                            <ul class="classroomDropdown dropdown-menu">
                                <li><a class=" classroom-item dropdown-item" onclick="openEditModal({{ $classroom->id }})">Edit</a></li>
                                <li>
                                    <form id="deleteForm{{ $classroom->id }}" action="{{ route('home.destroy', ['classroomId' => $classroom->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="classroom-item dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('deleteForm{{ $classroom->id }}').submit();">Delete</a>
                                    </form>
                                </li>
                            </ul>
                        @endif
                </div>
            <div class="secondsection"></div>
        </div>
    @include('editmodal',['classroom' =>$classroom])
