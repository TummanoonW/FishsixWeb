<?php
    class Modal{
    public static function initRegisterModal($dir, $redirect){
        ?>
            <!-- Modal -->
            <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="registerModalTitle">ก่อนดำเนินการต่อ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="p-2">
                        <a href="<?php Nav::echoURL($dir, App::$pageLogin) ?>" class="btn btn-light btn-block">มีบัญชีแล้ว? เข้าสู่ระบบเลย</a>
                    </div>
                    <hr>
                    <form action="<?php Nav::echoURL($dir, App::$routeRegister) ?>" method="POST">
                        <div class="form-group">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-merge">
                                <input name="password" id="password" type="password" class="form-control form-control-prepended" placeholder="กรอกรหัสผ่านที่ต้องการ" onchange="checkPass()" minlength="6" maxlength="12" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fas fa-key"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="username">ชื่อผู้ใช้: </label>
                            <div class="input-group input-group-merge">
                                <input name="username" id="username" type="text" class="form-control form-control-prepended" placeholder="กรอกชื่อผู้ใช้ที่ต้องการ" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="fname">ชื่อจริง:</label>
                            <div class="input-group input-group-merge">
                                <input name="fname" id="fname" type="text" class="form-control form-control-prepended" placeholder="กรอกชื่อจริงของคุณ" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="lname">นามสกุล:</label>
                            <div class="input-group input-group-merge">
                                <input name="lname" id="lname" type="text" class="form-control form-control-prepended" placeholder="กรอกนามสกุลของคุณ" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-merge">
                                <input name="phone" id="phone" type="text" class="form-control" placeholder="123-456-7890" data-mask="000-000-0000" autocomplete="off" maxlength="12">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">สมัครสมาชิก</button>
                        </div>
                    </div>
                  </div>
                  <!--<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                  </div>-->
                </form>
              </div>
            </div>  

            <script>
                $('#loginModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var recipient = button.data('whatever') // Extract info from data-* attributes
                    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    var modal = $(this)
                    modal.find('.modal-title').text('New message to ' + recipient)
                    modal.find('.modal-body input').val(recipient)
                });
            </script>
        <?php
    }
}