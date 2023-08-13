	<div class="container list"> 
		<div class="col col-12">
			<div class="row justify-content-center;">
				<div class="col col-10 p-0 w-100">

                <!-- <form class="form" id="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="page slide-page form__container center drag-area h-auto" id="upload-container">
                        <div class="sys_controler">
                            <div class="sys_upload">
                                <div class="form__files-container containers" id="files-list-container"></div>

                                <!- This is the Contant field ->
                                <div class="form-group col-md-12 d-none">
                                    <style>textarea#message::placeholder{ color: var(--timer-color); }</style>
                                    <textarea class="form-control input-sm px-2" type="textarea" name="post_text" id="message" placeholder="What's on Your Mind?" maxlength="200" rows="6"></textarea>
                                    <span class="help-block d-flex justify-content-end">
                                        <p id="characterLeft" class="help-block" style="margin-top: -2rem; margin-right: 1rem; color: var(--text-color);">You have reached the limit</p>
                                    </span>
                                </div>

                                <div class="input_btn d-flex flex-column align-items-center justify-content-center on-drop" style="cursor: pointer; font-size: larger;">
                                    <div class="upload_ico">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                        </svg>
                                    </div>
                                    <div class="upload_txt mt-2">Uploads</div>
                                    <p class="image-count"></p>
                                </div>

                                <input type="file" accept="image/*" name="post_image" class="custom-file-input file form__file" id="chooseFile" multiple required>
                            </div>
                            <div class="field field_btns px-4 m-0">
                                <a class="firstClose close" id="upclose">Close</a>
                                <button type="submit" name="submit" id="post" class="submit justify-content-around align-items-center next" style="display: none;">Post</button>
                            </div>
                        </div>
                    </div>
                    </form> -->
					
                    <!-- START OF STORIES -->
					<div class="card mt mt-5 rounded-0">
                        <?php
							$posts = Dream::getAllDreams();

							use Carbon\Carbon;

							foreach ($posts as $post) {
								$p = new Dream($post['id']);
								$uploaded_time = Carbon::parse($p->getUploadedTime());
								$uploaded_time_str = $uploaded_time->diffForHumans();
						?>  
                        
                        <div class="card-body d-flex justify-content-start w-auto overflow-x-scroll overflow-y-hidden" style="white-space: nowrap;" id="post-<?=$post['id']?>">
                            <div class="nav-prev position-absolute arrow" style="cursor: pointer; z-index: 1; display: none;">
                                <i class="icon prev-btn d-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.6rem" height="1.6rem" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"></path>
                                    </svg>
                                </i>
                            </div>
                            <ul class="list-unstyled mb-0">
                                
                                <li class="list-inline-item">
                                    <div class="d-flex flex-column align-items-center active">
                                        <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center border story-profile-photo" style="width: 4rem; height: 4rem;">
                                            <img id="dream" src="<?=$p->getdreamimage()?>" alt="..." style="transform: scale(1);width: 100%;" />
                                        </div>
                                        <small id="dream" class="text text-capitalize font-monospace" style="color: var(--text-color); font-weight: bold;"><?=$p->getOwner()?>,<?=$uploaded_time_str?></small>
                                    </div>
                                </li>
                                
                            </ul>
                            <div class="nav-next position-absolute arrow">
                                <i class="icon Next-btn d-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.6rem" height="1.6rem" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"></path>
                                    </svg>
                                </i>
                            </div>
                        </div>
                    </div>
                    <?php
						}
					?>
                    <!-- END OF STORIES -->
                    <h3 id="total-posts">Total Posts: N/A</h3>