<?php Session::loadTemplate('_header'); ?>

<style>
    nav.navbar.w-100.h-100.p-2.position-fixed.rs-navbar.sidebar {
        display: none;
    }
</style>

<div class="container list p-0">
	<div class="search-layout w-100 position-absolute z-1">
		<div class="rows justify-content-center">
			<div class="col col-10 p-0 w-100">
                <div class="overflow-hidden">
                    <div class="px-2 py-4">

                        <form autocomplete="off" id="form" class="d-flex align-items-center w-100">
                            <a href="/" class="text me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                </svg>
                            </a>
                            <div class="text w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search position-absolute" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                                <input id="search" type="search" name="search" class="search-input w-100" placeholder="Search..." required>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="users-profile">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <div class="col">
                <div class="card-style">
                    <div class="box card-style">
                        <img src="assets/images/default/profile-1.jpg" alt="profile image">
                        <div class="text user-info">
                            <p class="user_name m-0">Username</p>
                            <p class="user_bio m-0">Your Bio Getting to server.</p>
                        </div>
                        <div class="arr_container card-style">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                            </svg>
                        </div>
                        <div class="left_container off">
                            <div class="user-activity text">
                                <div>Posts 100</div>
                                <div>Likes 56</div>
                            </div>

                            <div class="icons">
                                <a href="#" target="_blank" class="bi bx-facebook"></a>
                                <a href="#" target="_blank" class="fab fa-instagram"></a>
                                <a href="#" target="_blank" class="fab fa-linkedin"></a>
                                <a href="#" target="_blank" class="fab fa-github"></a>
                            </div>
                            <div class="cancel card-style">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card-style">
                    <div class="box card-style">
                        <img src="assets/images/default/profile-2.jpg" alt="profile image">
                        <div class="text user-info">
                            <p class="user_name m-0">Username</p>
                            <p class="user_bio m-0">Your Bio Getting to server.</p>
                        </div>
                        <div class="arr_container card-style">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                            </svg>
                        </div>
                        <div class="left_container off">
                            <div class="user-activity text">
                                <div>Posts 100</div>
                                <div>Likes 56</div>
                            </div>

                            <div class="icons">
                                <a href="#" target="_blank" class="bi bx-facebook"></a>
                                <a href="#" target="_blank" class="fab fa-instagram"></a>
                                <a href="#" target="_blank" class="fab fa-linkedin"></a>
                                <a href="#" target="_blank" class="fab fa-github"></a>
                            </div>
                            <div class="cancel card-style">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card-style">
                    <div class="box card-style">
                        <img src="assets/images/default/profile-3.jpg" alt="profile image">
                        <div class="text user-info">
                            <p class="user_name m-0">Username</p>
                            <p class="user_bio m-0">Your Bio Getting to server.</p>
                        </div>
                        <div class="arr_container card-style">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                            </svg>
                        </div>
                        <div class="left_container off">
                            <div class="user-activity text">
                                <div>Posts 100</div>
                                <div>Likes 56</div>
                            </div>

                            <div class="icons">
                                <a href="#" target="_blank" class="bi bx-facebook"></a>
                                <a href="#" target="_blank" class="fab fa-instagram"></a>
                                <a href="#" target="_blank" class="fab fa-linkedin"></a>
                                <a href="#" target="_blank" class="fab fa-github"></a>
                            </div>
                            <div class="cancel card-style">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card-style">
                    <div class="box card-style">
                        <img src="assets/images/default/profile-1.jpg" alt="profile image">
                        <div class="text user-info">
                            <p class="user_name m-0">Username</p>
                            <p class="user_bio m-0">Your Bio Getting to server.</p>
                        </div>
                        <div class="arr_container card-style">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                            </svg>
                        </div>
                        <div class="left_container off">
                            <div class="user-activity text">
                                <div>Posts 100</div>
                                <div>Likes 56</div>
                            </div>

                            <div class="icons">
                                <a href="#" target="_blank" class="bi bx-facebook"></a>
                                <a href="#" target="_blank" class="fab fa-instagram"></a>
                                <a href="#" target="_blank" class="fab fa-linkedin"></a>
                                <a href="#" target="_blank" class="fab fa-github"></a>
                            </div>
                            <div class="cancel card-style">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>