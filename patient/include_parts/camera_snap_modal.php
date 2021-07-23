
    <div class="modal fade" id="snap_cameralModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg> ... </svg>
                </button>
            </div>
            <div class="modal-body">
            <div id="camBox" style="width:100%;height:100%;">
                <!--POPUP DIALOG BOX TO SHOW LIVE WEBCAM.-->
                <div class="revdivshowimg" style="top:20%;text-align:center;margin:0 auto;">

                    <div id="camera" style="height:auto;text-align:center;margin:0 auto;"></div>

                    <p>
                        <input type="button" value="Ok" id="btAddPicture" 
                            onclick="addCamPicture()" /> 
                        <input type="button" value="Cancel" 
                            onclick="document.getElementById('camBox').style.display = 'none';" />
                    </p>
                    <input type="hidden" id="rowid" /><input type="hidden" id="dataurl" />
                </div>

            </div>            
    </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>