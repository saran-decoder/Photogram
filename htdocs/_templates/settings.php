<?php Session::loadTemplate('_header'); ?>

<div class="container list p-0"> 
	<div class="profile-layout h-100 position-absolute">
		<div class="rows justify-content-center">
			<div class="col col-10 p-0 w-100">
                <div class="overflow-hidden">
                    <div class="px-2 py-4">
                        <div class="z-1 d-flex justify-content-between align-items-center position-relative" style="bottom: 1rem;">
                            <a class="text" href="profile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </a>
                        </div>
                        
                        <div class="list-group mt-3">
                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between setting">
                                <li class="mode position-relative d-flex align-items-center justify-content-between w-100">
                                    <div class="sun-mode">
                                        <i class='icon position-absolute d-flex align-items-center moon'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-brightness-low" viewBox="0 0 16 16">
                                                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707zM3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707z"/>
                                            </svg>
                                            <span class="mode-text text ms-3" for="darkSwitch">Light Theme</span>
                                        </i>
                                    </div>
                                    <div class="moon-mode">
                                        <i class='icon d-flex align-items-center sun' style="width: max-content;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" fill="currentColor" class="bi bi-moon-stars" viewBox="0 0 16 16">
                                                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                                                <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
                                            </svg>
                                            <span class="mode-text text ms-4" for="darkSwitch">Dark Theme</span>
                                        </i>
                                    </div>
                                    <div class="toggle-switch mb-1 d-flex align-items-center justify-content-center">
                                        <input type="checkbox" class="switch form-check-input position-relative" id="darkSwitch">
                                    </div>
                                </li>
                            </label>
                        
                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between setting">
                                <a href="#">
                                    <svg width="1.4em" height="1.4em" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>Give Feedback
                                </a>
                            </label>

                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between setting">
                                <a href="#">
                                    <svg width="1.4em" height="1.4em" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                        <path d="M12 16v-4"></path>
                                        <path d="M12 8h.01"></path>
                                    </svg>About
                                </a>
                            </label>

                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between setting">
                                <a href="#">
                                    <svg width="1.4em" height="1.4em" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                        <path d="M12 8a4 4 0 1 0 0 8 4 4 0 1 0 0-8z"></path>
                                        <path d="m4.93 4.93 4.24 4.24"></path>
                                        <path d="m14.83 14.83 4.24 4.24"></path>
                                        <path d="m14.83 9.17 4.24-4.24"></path>
                                        <path d="m14.83 9.17 3.53-3.53"></path>
                                        <path d="m4.93 19.07 4.24-4.24"></path>
                                    </svg>Support
                                </a>
                            </label>

                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between setting">
                                <a class="text" href="/?logout">Logout</a>
                            </label>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>