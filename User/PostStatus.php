                        <!-- USER POST DIVISION -->
                        <div class="row-fluid">
                            <div class="userPicture span2" >
                                <img src="../Database/Images/Sponsor/<?php echo $userdata[2]; ?>"  />
                            </div>

                            <div class="userPost span9">
                                <div class="row-fluid"> 	
                                    <div class="span9 postArea">

                                        <form id="form1" action="UserCtrl.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="action"  value="addpost"/>
                                            <input type="hidden" name="id"  value="<?php echo $_SESSION['usernameU']; ?>"/>

                                            <textarea class="textArea" name="content"></textarea>
                                            <div id="uploadbtn" onclick="getFile()"><i class="icon-picture"></i>&nbsp;Upload Photo</div>
                                            <div style="height: 0px; width: 0px;overflow:hidden;">
                                                <input id="upfile" type="file" name="photo" value="upload" onchange="sub(this)"/>
                                            </div>


                                    </div>

                                    <!-- Area for inputing a post  -->
                                    <div class="span2">


                                        <input type="submit" class="postButton span10" id="post" name="post" value=""/>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>