                <!-- Change your password START -->
                <div class="tab-pane fade" id="nav-pass-tab">

                    <!-- Account settings START -->
                    <div class="setting p-3">

                        <!-- Title START -->
                        <div class="border-0 mb-3 d-flex align-items-center justify-content-between">
                            <a class="text profile-icon" href="/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
                                </svg>
                            </a>
                            <h1 class="h5 text m-0">Change your password</h1>
                        </div>
                        <!-- Card body START -->
                        <div class="setting-body">
                            <!-- Form settings START -->
                            <?php
                                if (isset($_POST['current-pass']) and isset($_POST['new-pass']) and isset($_POST['confirm-pass'])) {
                                    $current_password = $_POST['current-pass'];
                                    $password = $_POST['new-pass'];
                                    $confirm_password = $_POST['confirm-pass'];
                                    Profile::newPassword($current_password, $password, $confirm_password );
                                }
                            ?>
                            <form class="row g-3" method="post" action="" autocomplete="off" id="Profile-Form2" novalidate>
                                <!-- Current password -->
                                <div class="col-12 mb-2 mt-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 17v4m-2-1l4-2m-4 0l4 2m-9-3v4m-2-1l4-2m-4 0l4 2m12-3v4m-2-1l4-2m-4 0l4 2M9 6a3 3 0 1 0 6 0a3 3 0 0 0-6 0m-2 8a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2"/>
                                            </svg>
                                        </span>
                                        <input type="password" class="setting-form-control form-control" id="current-password" name="current-pass" placeholder="Current password" required>
                                        <span class="input-group-text" id="currentPassword">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M1.48 1.48a.5.5 0 0 0-.049.65l.049.057l2.69 2.69A6.657 6.657 0 0 0 1.533 8.71a.5.5 0 0 0 .97.242a5.66 5.66 0 0 1 2.386-3.356l1.207 1.207a2.667 2.667 0 0 0 3.771 3.771l3.946 3.946a.5.5 0 0 0 .756-.65l-.049-.057l-4.075-4.076v-.001l-.8-.799l-1.913-1.913h.001l-1.92-1.919v-.001l-.755-.754l-2.871-2.87a.5.5 0 0 0-.707 0m5.323 6.03l2.356 2.357A1.667 1.667 0 0 1 6.802 7.51M8 3.667c-.667 0-1.314.098-1.926.283l.825.824a5.669 5.669 0 0 1 6.6 4.181a.5.5 0 0 0 .97-.242A6.669 6.669 0 0 0 8 3.667m.13 2.34l2.534 2.533A2.668 2.668 0 0 0 8.13 6.006"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <!-- New Password -->
                                <div class="col-12 mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M12 10v4m-1.732-3l3.464 2m0-2l-3.465 2m-3.535-3v4M5 11l3.464 2m0-2L5 13m12.268-3v4m-1.732-3L19 13m0-2l-3.465 2M22 12c0 3.771 0 5.657-1.172 6.828C19.657 20 17.771 20 14 20h-4c-3.771 0-5.657 0-6.828-1.172C2 17.657 2 15.771 2 12c0-3.771 0-5.657 1.172-6.828C4.343 4 6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172c.654.653.943 1.528 1.07 2.828"/>
                                            </svg>
                                        </span>
                                        <input type="password" class="setting-form-control form-control" id="new-password" name="new-pass" placeholder="New Password" required>
                                        <span class="input-group-text" id="newPassword">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M1.48 1.48a.5.5 0 0 0-.049.65l.049.057l2.69 2.69A6.657 6.657 0 0 0 1.533 8.71a.5.5 0 0 0 .97.242a5.66 5.66 0 0 1 2.386-3.356l1.207 1.207a2.667 2.667 0 0 0 3.771 3.771l3.946 3.946a.5.5 0 0 0 .756-.65l-.049-.057l-4.075-4.076v-.001l-.8-.799l-1.913-1.913h.001l-1.92-1.919v-.001l-.755-.754l-2.871-2.87a.5.5 0 0 0-.707 0m5.323 6.03l2.356 2.357A1.667 1.667 0 0 1 6.802 7.51M8 3.667c-.667 0-1.314.098-1.926.283l.825.824a5.669 5.669 0 0 1 6.6 4.181a.5.5 0 0 0 .97-.242A6.669 6.669 0 0 0 8 3.667m.13 2.34l2.534 2.533A2.668 2.668 0 0 0 8.13 6.006"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <!-- Confirm Password -->
                                <div class="col-12 mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M12 10v4m-1.732-3l3.464 2m0-2l-3.465 2m-3.535-3v4M5 11l3.464 2m0-2L5 13m12.268-3v4m-1.732-3L19 13m0-2l-3.465 2M22 12c0 3.771 0 5.657-1.172 6.828C19.657 20 17.771 20 14 20h-4c-3.771 0-5.657 0-6.828-1.172C2 17.657 2 15.771 2 12c0-3.771 0-5.657 1.172-6.828C4.343 4 6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172c.654.653.943 1.528 1.07 2.828"/>
                                            </svg>
                                        </span>
                                        <input type="password" class="setting-form-control form-control" id="confirm-password" name="confirm-pass" placeholder="Confirm Password" required>
                                        <span class="input-group-text" id="confirmPassword">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M1.48 1.48a.5.5 0 0 0-.049.65l.049.057l2.69 2.69A6.657 6.657 0 0 0 1.533 8.71a.5.5 0 0 0 .97.242a5.66 5.66 0 0 1 2.386-3.356l1.207 1.207a2.667 2.667 0 0 0 3.771 3.771l3.946 3.946a.5.5 0 0 0 .756-.65l-.049-.057l-4.075-4.076v-.001l-.8-.799l-1.913-1.913h.001l-1.92-1.919v-.001l-.755-.754l-2.871-2.87a.5.5 0 0 0-.707 0m5.323 6.03l2.356 2.357A1.667 1.667 0 0 1 6.802 7.51M8 3.667c-.667 0-1.314.098-1.926.283l.825.824a5.669 5.669 0 0 1 6.6 4.181a.5.5 0 0 0 .97-.242A6.669 6.669 0 0 0 8 3.667m.13 2.34l2.534 2.533A2.668 2.668 0 0 0 8.13 6.006"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <!-- Button  -->
                                <div class="col-12 text-end">
                                    <button type="submit" id="update-info" class="btn btn-sm btn-primary mb-0">Update password</button>
                                </div>
                            </form>
                            <!-- Settings END -->
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Account settings END -->

                </div>