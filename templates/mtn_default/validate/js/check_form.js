$(document).ready(function(){
/*----------------Error website-----------------------*/
    $("#contactFrom").validate({
        rules: {
            ct_name: {
                required: true,
                minlength: 3,
                maxlength: 150
            },
            ct_email: {
                required: true,
                email: true,
                maxlength: 150
            },
            ct_phone: {
                number: true,
                minlength: 10,
                maxlength: 11
            },
            ct_content: {
                required: true,
                minlength: 10
            }
        },
        messages: {
           ct_name: {
                required: "Bạn vui lòng cho biết họ tên",
                minlength: "Họ tên của bạn quá ngắn",
                maxlength: "Họ tên của bạn quá dài"
            },
            ct_email: {
                required: "Vui lòng nhập email của bạn",
                email: "Email của bạn không đúng",
                maxlength: "Email của bạn quá dài"
            },
            ct_phone: {
                number: "Vui lòng nhập số",
                minlength: "Số điện thoại không đúng",
                maxlength: "Bạn không cần nhập khoảng trắng"
            },
            ct_content: {
                required: "Vui lòng nhập nội dung liên hệ",
                minlength: "Nhập ít nhất 10 ký tự"
            }
        },
        submitHandler: function(form) {
            checkContact();
        }//END submitHandler
    });//END validate contact form
/*----------------Error website-----------------------*/
    $("#error").validate({
        rules: {
            erm_info: {
                maxlength: 150
            },
            erm_content: {
                minlength: 10
            }
        },
        messages: {
           erm_info: {
                maxlength: "Email hoặc điện thoại quá hạn cho phép"
            },
            erm_content: {
                minlength: "Nội dung liên hệ ít nhất phải 10 ký tự"
            }
        },
        submitHandler: function(form) {
            checkErrorContact();
        }//END submitHandler
    });//END validate Register form
/*----------------Send mail-----------------------*/
    $("#sendmail").validate({
        rules: {
            sm_name: {
                required: true,
                maxlength: 150
            },
            sm_info: {
                required: true,
                maxlength: 250
            },
            sm_content: {
                required: true,
                minlength: 10
            }
        },
        messages: {
           sm_name: {
                required: "Vui lòng cho biết tên của bạn",
                maxlength: "Tên bạn hình như không đúng lắm"
            },
            sm_info: {
                required: "Vui lòng cho biết email hoặc số điện thoại",
                maxlength: "Email hoặc số điện thoại của bạn đã quá hạn cho phép"
            },
            sm_content: {
                required: "Nhập nội dung liên hệ tại đây",
                minlength: "Nội dung liên hệ phải ít nhất 10 ký tự"
            }
        },
        submitHandler: function(form) {
            checkSendMailContact();
        }//END submitHandler
    });//END validate Register form
/*----------------recoverynewpass-----------------------*/
    $("#recoverynewpass").validate({
        rules: {
            rcv_newpass: {
                required: true,
                maxlength: 150,
                minlength: 8
            },
            rcv_re_newpass: {
                equalTo: "#rcv_newpass"
            }
        },
        messages: {
            rcv_newpass: {
                required: "Bạn chưa nhập mật khẩu mới",
                maxlength: "Mật khẩu của bạn quá dài",
                minlength: "Mật khẩu phải ít nhất 8 ký tự"
            },
            rcv_re_newpass: {
                equalTo: "Mật khẩu xác nhận không đúng"
            }
        },
        submitHandler: function(form) {
            checkRecoveryPassAction();
        }//END submitHandler
    });//END validate Register form
/*----------------Register form-----------------------*/
    $("#registerForm").validate({
        rules: {
            rgt_username: {
                required: true,
                maxlength: 100,
                minlength: 5
            },
            rgt_password: {
                required: true,
                minlength: 8
            },
            rgt_re_password: {
                required: true,
                equalTo: "#rgt_password"
            },
            rgt_firstname: {
                required: true,
                maxlength: 100
            },
            rgt_lastname: {
                required: true,
                maxlength: 50
            },
            rgt_address: {
              minlength: 6  
            },
            rgt_email: {
              email: true  
            },
            rgt_phone: {
                number: true,
                minlength: 10,
                maxlength: 11
            },
            rgt_date: {
                number: true,
                maxlength: 2
            },
            rgt_month: {
                number: true,
                maxlength: 2
            },
            rgt_year: {
                number: true,
                maxlength: 4
            },
            rgt_agree: {
                required: true
            }
        },
        messages: {
            rgt_username: {
                required: "Nhập tên đăng nhập của bạn",
                maxlength: "Tên đăng nhập quá hạn cho phép",
                minlength: "Tên đăng nhập ít nhất 5 ký tự"
            },
            rgt_password: {
                required: "Nhập mật khẩu",
                minlength: "Mật khẩu phải ít nhất 8 ký tự"
            },
            rgt_re_password: {
                required: "Vui lòng xác nhận lại mật khẩu",
                equalTo: "Mật khẩu không khớp"
            },
            rgt_firstname: {
                required: "Nhập họ và tên đệm của bạn",
                maxlength: "Họ và tên đệm quá hạn cho phép"
            },
            rgt_lastname: {
                required: "Nhập tên của bạn",
                maxlength: "Tên bạn quá hạn cho phép"
            },
            rgt_address: {
              minlength: "Địa chỉ ít nhất 6 ký tự"  
            },
            rgt_email: {
              email: "Email không đúng định dạng"  
            },
            rgt_phone: {
                number: "Điện thoại phải là số",
                minlength: "Nhập đủ 10 số điện thoại",
                maxlength: "Số điện thoại không đúng"
            },
            rgt_date: {
                number: "Ngày phải là số",
                maxlength: "Ngày không đúng"
            },
            rgt_month: {
                number: "Tháng phải là số",
                maxlength: "Tháng không đúng"
            },
            rgt_year: {
                number: "Năm sinh phải là số",
                maxlength: "Năm không đúng"
            },
            rgt_agree: {
                required: "Bạn phải đồng ý vói điều khoản sử dụng"
            }
        },
        submitHandler: function(form) {
            checkRegister();
        }//END submitHandler
    });//END validate Register form
/*----------------Recovery pass form-----------------------*/
    $("#forgotpass").validate({
        rules: {
            fgp_email: {
                required: true,
                email: true
            }
        },
        messages: {
            fgp_email: {
                required: "Nhập email đăng ký tài khoản",
                email: "Email chưa đúng"
            }
        },
        submitHandler: function(form) {
            checkRecoveryPass();
        }//END submitHandler
    });//END validate changepass form
/*----------------Change pass form-----------------------*/
    $("#changePass").validate({
        rules: {
            oldpass: {
                required: true
            },
            newpass: {
                required: true,
                minlength: 8
            },
            renewpass: {
                required: true,
                equalTo: "#newpass"
            }
        },
        messages: {
            oldpass: {
                required: "Vui lòng nhập lại mật khẩu cũ"
            },
            newpass: {
                required: "Vui lòng nhập mật khẩu mới",
                minlength: "Mật khẩu phải ít nhất 8 ký tự"
            },
            renewpass: {
                required: "Vui lòng nhập xác nhận mật khẩu",
                equalTo: "Xác nhận mật khẩu chưa đúng"
            }
        },
        submitHandler: function(form) {
            checkChangePass();
        }//END submitHandler
    });//END validate changepass form
/*----------------edit bank form-----------------------*/
    $("#editbank").validate({
        rules: {
            eb_bank: {
                required: true
            },
            eb_accounter: {
                required: true
            },
            eb_series: {
                required: true
            },
            eb_chinhanh: {
                required: true
            }
        },
        messages: {
           eb_bank: {
                required: "Nhập tên ngân hàng"
            },
            eb_accounter: {
                required: "Nhập chủ tài khoản"
            },
            eb_series: {
                required: "Nhập số tài khoản"
            },
            eb_chinhanh: {
                required: "Nhập chi nhánh ngân hàng của bạn"
            } 
        },
        submitHandler: function(form) {
            checkEditBank();
        }//END submitHandler
    })//END validate edit bank form
/*----------------add bank form-----------------------*/
    $("#addbank").validate({
        rules: {
            ab_bank: {
                required: true
            },
            ab_accounter: {
                required: true
            },
            ab_series: {
                required: true
            },
            ab_chinhanh: {
                required: true
            }
        },
        messages: {
            ab_bank: {
                required: "Nhập tên ngân hàng"
            },
            ab_accounter: {
                required: "Nhập chủ tài khoản"
            },
            ab_series: {
                required: "Nhập số tài khoản"
            },
            ab_chinhanh: {
                required: "Nhập chi nhánh ngân hàng của bạn"
            } 
        },
        submitHandler: function(form) {
            checkAddBank();
        }//END submitHandler
    })//END validate add bank form
/*----------------edit member info form-----------------------*/
    $("#editmeminfo").validate({
        rules: {
            eim_firstname: {
                required: true,
                minlength: 2
            },
            eim_lastname: {
                required: true,
                minlength: 2
            },
            eim_address: {
                minlength: 5
            },
            eim_phone: {
                number: true,
                maxlength: 11,
                minlength: 10
            },
            eim_job: {
                minlength: 5
            },
            eim_aboutme: {
                minlength: 10
            }
        },
        messages: {
            eim_firstname: {
                required: "Nhập họ của bạn",
                minlength: "Họ phải ít nhất 2 ký tự"
            },
            eim_lastname: {
                required: "Nhập tên của bạn",
                minlength: "Tên phải ít nhất 2 ký tự"
            },
            eim_address: {
                minlength: "Địa chỉ phải ít nhất 5 ký tự"
            },
            eim_phone: {
                number: "Bạn vui lòng nhập số",
                maxlength: "Số điện thoại tối đa chỉ 11 số",
                minlength: "Vui lòng nhập đủ 10 số hoặc 11 số"
            },
            eim_job: {
                minlength: "Nghề nghiệp ít nhất 5 ký tự"
            },
            eim_aboutme: {
                minlength: "Giới thiệu ít nhất 10 ký tự về bạn"
            }
        },
        submitHandler: function(form){
            checkEditMemberInfo();
        }
    });//END validate edit member info
/*----------------edit contact info member-----------------------*/
    $("#commentForm").validate({
        rules: {
            cmcontent: {
                required: true,
                minlength: 10,
                maxlength: 1000
            }
        },
        messages: {
            cmcontent: {
                required: "Nội dung bình luận không được bỏ trống",
                minlength: "Nội dung bình luận ít nhất 10 ký tự",
                maxlength: "Nội dung bình luận vượt quá hạn cho phép"
            }
        },
        submitHandler: function(form){
            checkComment();
        }
    });//END validate edit contact info member
});