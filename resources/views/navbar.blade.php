<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">ScholarNotes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="padding-rg-2 navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                </li>
                @if(isset($userInfo))
                    <li class="nav-item nav-link addClass dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" class=" NMm5M"><path d="M20 13h-7v7h-2v-7H4v-2h7V4h2v7h7v2z"></path></svg>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" onclick="openModal()">Join Class</a></li>
                            <li><a class="dropdown-item" onclick="openAddClassModal()">Create Class</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="profileimage" src="<%=currentUser.avatar%>" alt="">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" onclick="openSettingsModal()">Settings</a></li>
                            <li>
                                <form action="{{route('authentification.logout')}}" method="post">
                                    @csrf
                                    <input type="submit" value="Logout" class="dropdown-item">
                                </form>
                            </li>
                        </ul>
                    </li>

                    <div id="myModal" class="modal-container">
                        <div class="modal-content">
                            <span class="close-button" onclick="closeModal()"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
                            <div>
                                <form action="{{route('home.joinClass')}}" method="POST">
                                    @csrf
                                    <div>
                                        <label class="modalSecondDiv titleModal">Class Code</label>
                                    </div>
                                    <div>
                                        <input id="Idcode"class="form-control" type="text" name="codeClass" id="" placeholder="Class Code">
                                    </div>
                                    <div class="modalSecondDiv informationsDiv">
                                        <label style="font-weight:bolder;">To sign in with a class code</label>
                                        <ul>
                                            <li>Use an authorized account</li>
                                            <li>Use a class code with 5-7 letters or numbers, and no spaces or symbols</li>
                                        </ul>
                                    </div>
                                    <div class="right">
                                        <button class="btn btn-primary joinButton" type="submit">Join Class</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="addClassModal" class="modal-container">
                        <div class="modal-content">
                            <span class="close-button" onclick="closeAddClassModal()"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
                            <div>
                                <form action="{{route('home.addClass')}}" method="POST">
                                    @csrf
                                    <div>
                                        <label class="modalSecondDiv titleModal">Add a Classroom</label>
                                    </div>
                                    <div>
                                        <input id="Idcode"class="form-control classnameform" type="text" name="classname" id="" placeholder="Class Name">
                                        <input id="Idcode"class="form-control" type="text" name="classsubject" id="" placeholder="Class Subject">
                                    </div>
                                    <div class="modalSecondDiv informationsDiv">
                                        <label style="font-weight:bolder;">To Add a classroom you must</label>
                                        <ul>
                                            <li>Fill all the elements.</li>
                                        </ul>
                                    </div>
                                    <div class="right">
                                        <button class="btn btn-primary joinButton" type="submit">Add Class</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @include('settingsmodal')
                @endif
            @if(!isset($userInfo))
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/login">Login</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="/signup">SignUp</a>
                </li>
            @endif

          
        </ul>
      </div>
    </div>
  </nav>