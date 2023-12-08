<div id="editModal-{{ $classroom->id }}" class="modal-container">
    <div class="modal-content">
            <span class="close-button" onclick="document.getElementById('editModal-{{ $classroom->id }}').style.display = 'none';"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
            <div>
                <form action="{{ route('home.editClass', ['classroom' => $classroom->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="modalSecondDiv titleModal">Edit a Classroom</label>
                    </div>
                    <div>
                        <input id="IdClassName"class="form-control classnameform" type="text" name="classname" id="" placeholder="Class Name" value="{{$classroom->classname}}">
                        <input id="IdClassSubject"class="form-control" type="text" name="classsubject" id="" placeholder="Class Subject" value="{{$classroom->classsubject}}">
                    </div>
                    <div class="modalSecondDiv informationsDiv">
                        <label style="font-weight:bolder;">You can Edit the classroom by</label>
                        <ul>
                            <li>Changing at least one of the elements</li>
                        </ul>
                    </div>
                    <div class="right">
                        <button class="btn btn-primary joinButton" type="submit">Edit</button>
                    </div>
                </form>
            </div>
    </div>
</div>
