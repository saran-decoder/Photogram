            <?php
                $profile = Profile::getuserProfile();
                $Auth = Profile::getAuth();
                $email = $Auth['email'];
                $phone = $Auth['phone'];
                $AE_profile = Profile::getuserEAuth($email);
                $AP_profile = Profile::getuserPAuth($phone);
            ?>
            <div class="tab-pane fade" id="about" role="tabpanel">
                <div class="container">
                    <div class="row gy-3 g-md-3" data-masonry='{"percentPosition": true }'>
                        <div class="card border-0 p-0 pro-card">
                            <!-- Card header START -->
                            <div class="border-0 p-2 px-3">
                                <h5 class="card-title m-0 text">Profile Info</h5> 
                            </div>
                            <!-- Card header END -->
                            <!-- Card body START -->
                            <?php if (!empty($profile && $AE_profile && $AP_profile)) { ?>
                            <div class="card-body">

                                <!-- About START -->
                                <?php if (!empty($profile['bio'])) { ?>
                                <div class="rounded border px-3 py-2 mb-3"> 
                                    <div class="d-flex align-items-center justify-content-between about-color">
                                       <h6>About:</h6>
                                    </div>
                                    <p class="card-about m-0"><?=$profile['bio']?></p>
                                </div>
                                <?php } ?>
                                <!-- About END -->
                                
                                <div class="row g-4">

                                    <!-- Birthday START -->
                                    <?php if (!empty($profile['dob'])) { ?>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center rounded border px-3 py-2"> 
                                            <p class="mb-0 card-info-name d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cake me-2 mb-1" viewBox="0 0 16 16">
                                                    <path d="m7.994.013-.595.79a.747.747 0 0 0 .101 1.01V4H5a2 2 0 0 0-2 2v3H2a2 2 0 0 0-2 2v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a2 2 0 0 0-2-2h-1V6a2 2 0 0 0-2-2H8.5V1.806A.747.747 0 0 0 8.592.802zM4 6a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v.414a.9.9 0 0 1-.646-.268 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0A.9.9 0 0 1 4 6.414zm0 1.414c.49 0 .98-.187 1.354-.56a.914.914 0 0 1 1.292 0c.748.747 1.96.747 2.708 0a.914.914 0 0 1 1.292 0c.374.373.864.56 1.354.56V9H4zM1 11a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.793l-.354.354a.914.914 0 0 1-1.293 0 1.914 1.914 0 0 0-2.707 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0L1 11.793zm11.646 1.854a1.915 1.915 0 0 0 2.354.279V15H1v-1.867c.737.452 1.715.36 2.354-.28a.914.914 0 0 1 1.292 0c.748.748 1.96.748 2.708 0a.914.914 0 0 1 1.292 0c.748.748 1.96.748 2.707 0a.914.914 0 0 1 1.293 0Z"/>
                                                </svg> Born: <strong class="card-info ms-1"> <?=$profile['dob']?> </strong>
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- Birthday END -->

                                    <!-- Status START -->
                                    <?php if (!empty($profile['status'])) { ?>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center rounded border px-3 py-2"> 
                                            <p class="mb-0 card-info-name d-flex align-items-center">
                                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="m8.962 18.91l.464-.588zM12 5.5l-.54.52a.75.75 0 0 0 1.08 0zm3.038 13.41l.465.59zm-8.037-2.49a.75.75 0 0 0-.954 1.16zm-4.659-3.009a.75.75 0 1 0 1.316-.72zm.408-4.274c0-2.15 1.215-3.954 2.874-4.713c1.612-.737 3.778-.541 5.836 1.597l1.08-1.04C10.1 2.444 7.264 2.025 5 3.06C2.786 4.073 1.25 6.425 1.25 9.137zM8.497 19.5c.513.404 1.063.834 1.62 1.16c.557.325 1.193.59 1.883.59v-1.5c-.31 0-.674-.12-1.126-.385c-.453-.264-.922-.628-1.448-1.043zm7.006 0c1.426-1.125 3.25-2.413 4.68-4.024c1.457-1.64 2.567-3.673 2.567-6.339h-1.5c0 2.198-.9 3.891-2.188 5.343c-1.315 1.48-2.972 2.647-4.488 3.842zM22.75 9.137c0-2.712-1.535-5.064-3.75-6.077c-2.264-1.035-5.098-.616-7.54 1.92l1.08 1.04c2.058-2.137 4.224-2.333 5.836-1.596c1.659.759 2.874 2.562 2.874 4.713zm-8.176 9.185c-.526.415-.995.779-1.448 1.043c-.452.264-.816.385-1.126.385v1.5c.69 0 1.326-.265 1.883-.59c.558-.326 1.107-.756 1.62-1.16zm-5.148 0c-.796-.627-1.605-1.226-2.425-1.901l-.954 1.158c.83.683 1.708 1.335 2.45 1.92zm-5.768-5.63a7.252 7.252 0 0 1-.908-3.555h-1.5c0 1.638.42 3.046 1.092 4.275z"/>
                                                </svg> Status: <strong class="card-info ms-1"> <?=$profile['status']?> </strong>
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- Status END -->

                                    <!-- Phone START -->
                                    <!-- TODO: implement full phone number display or not -->
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center rounded border px-3 py-2"> 
                                            <p class="mb-0 card-info-name d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-phone me-2" viewBox="0 0 16 16">
                                                    <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                                                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                                </svg> Phone: <strong class="card-info ms-1"> +91 <?=$AP_profile?> </strong>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Phone END -->

                                    <!-- Email START -->
                                    <!-- TODO: implement full email address display or not -->
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center rounded border px-3 py-2"> 
                                            <p class="mb-0 card-info-name d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-envelope-at me-2" viewBox="0 0 16 16">
                                                    <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                                    <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                                                </svg> Email: <strong class="card-info ms-1"> <?=$AE_profile?> </strong>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Email END -->

                                    <!-- Location START -->
                                    <?php if (!empty($profile['location'])) { ?>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center rounded border px-3 py-2"> 
                                            <p class="mb-0 card-info-name d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="18" height="18" viewBox="0 0 32 32">
                                                    <path fill="currentColor" d="M16 18a5 5 0 1 1 5-5a5.006 5.006 0 0 1-5 5m0-8a3 3 0 1 0 3 3a3.003 3.003 0 0 0-3-3"/>
                                                    <path fill="currentColor" d="m16 30l-8.436-9.949a35.076 35.076 0 0 1-.348-.451A10.889 10.889 0 0 1 5 13a11 11 0 0 1 22 0a10.884 10.884 0 0 1-2.215 6.597l-.001.003s-.3.394-.345.447ZM8.813 18.395s.233.308.286.374L16 26.908l6.91-8.15c.044-.055.278-.365.279-.366A8.901 8.901 0 0 0 25 13a9 9 0 1 0-18 0a8.905 8.905 0 0 0 1.813 5.395"/>
                                                </svg> Location: <strong class="card-info ms-1"> <?=$profile['location']?> </strong>
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- Location END -->

                                    <!-- Link START -->
                                    <?php if (!empty($profile['link'])) { ?>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center rounded border px-3 py-2"> 
                                            <p class="mb-0 card-info-name d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-link-45deg me-2" viewBox="0 0 16 16">
                                                    <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                                    <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                                                </svg> Link: <strong class="card-info ms-1">
                                                    <a class="text-decoration-none" href="<?=$profile['link']?>"><?=$profile['link']?></a>
                                                </strong>
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- Link END -->

                                </div>
                            </div>
                            <?php } else { ?>
                                <h5 class="text-muted text-center mt-4">No information available.</h5>
                            <?php } ?>
                            <!-- Card body END -->
                        </div>
                    </div>
                </div>
            </div>