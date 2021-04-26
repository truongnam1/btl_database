<?php
function loadPopup($status)
{
    if ($status == "ok") {
        $html = '  <!-- The Modal -->
        <div class="modal" id="popupOK">
          <div class="modal-dialog">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Trạng thái đặt bàn</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
               <p>Đặt bàn thành công</p>
                <p>Nếu có thắc mắc xin liên hệ 19001522 </p>
              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              
            </div>
          </div>
        </div>';

        $html .= "
                <script>
                $(document).ready(function() {
                $(function() {  $(\"#popupOK\").modal('show'); });
                
                });
                </script>";



        echo $html;
    } else if ($status == "error") {
        $html = '  <!-- The Modal -->
        <div class="modal" id="popupOK">
          <div class="modal-dialog">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Trạng thái đặt bàn</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
              Đặt bàn thất bại, vui lòng thử lại
              <p>Nếu có thắc mắc xin liên hệ 19001522 </p>
              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              
            </div>
          </div>
        </div>';

        $html .= "
                <script>
                $(document).ready(function() {
                $(function() {  $(\"#popupOK\").modal('show'); });
                
                });
                </script>";
        echo $html;
    }
}
