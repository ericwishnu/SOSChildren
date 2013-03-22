                <div class="span1">

                    <div class="row-fluid">
                        <form>
                            <input type="button" class="span12 pickMeButton" id="pickme" name="pickme" data-toggle="modal" href="#pickMeModal">
                        </form>
                    </div>

                    <div class="row-fluid">
                        <form>
                            <input type="button" class="span12 recommendedButton" id="recommended" name="recommended" data-toggle="modal" href="#Recomended">
                        </form>
                    </div>

                    <div class="row-fluid">
                        <form>
                            <input type="button" class="span12 emergencyButton" id="emergency" name="emergency" data-toggle="modal" href="#Emergency">
                        </form>
                    </div>


                    <!-- Friends Widget -->

                    <div class="row-fluid marginfriendButton">
                        <form action="PeopleCtrl.php" method="post">
                            <input type="hidden" name="action" value="listneighbour"/>
                            <input type="submit" value="" class="span12 friendButton" id="emergency" name="emergency">
                        </form>
                    </div>

                </div>



<!-- Modal for Widget button -->

            <!-- Pick Me Modal Division -->

            <div id="pickMeModal" class="modal hide fade in" style="display: none; ">  
                <div class="modal-header modalPink modal-radius">  
                    <a class="close" data-dismiss="modal">×</a>  
                    <h3>This is a Pick Me Modal Example</h3>  
                </div>  
                <div class="modal-body">  
                    <h4>Text in a modal</h4>  
                    <p>You can add some text here.</p>                
                </div>  
                <div class="modal-footer modalPink">  
                    <a href="#" class="btn btn-success">Call to action</a>  
                    <a href="#" class="btn" data-dismiss="modal">Close</a>  
                </div>  
            </div>  

            <!-- Recommended Modal Division -->

            <div id="Recomended" class="modal hide fade in" style="display: none; ">  
                <div class="modal-header modalPink modal-radius">  
                    <a class="close" data-dismiss="modal">×</a>  
                    <h3>Recommended</h3>  
                </div>  
                <div class="modal-body">  
                    <h4>Text in a modal</h4>  
                    <p>You can add some text here.</p>                
                </div>  
                <div class="modal-footer modalPink">  
                    <a href="#" class="btn btn-success">Call to action</a>  
                    <a href="#" class="btn" data-dismiss="modal">Close</a>  
                </div>  
            </div>  

            <!-- Emergency Button -->

            <div id="Emergency" class="modal hide fade in" style="display: none;">

                <div class="modal-header modalPink modal-radius">  
                    <a class="close" data-dismiss="modal">×</a>  
                    <h2>Emergency</h2>  
                </div>  
                <div class="modal-body">  
                    <h4>Text in a modal</h4>  
                    <p>Add some Text Here</p>
                </div>  
                <div class="modal-footer modalPink">  
                    <a href="#" class="btn btn-success">Call to action</a>  
                    <a href="#" class="btn" data-dismiss="modal">Close</a>  
                </div>  

            </div>  