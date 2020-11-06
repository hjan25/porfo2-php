(function($){

    // 키워드 검색 폼
    $('#header .search-box form').on('submit', function(){

        return false; // 유효성 체크 후 제거할 것
    });

    // 예약 폼
    $('#container').on('submit', '.tourreserve-content form', function(){
        var howMany = $('#how-many').val();
        if ( howMany <= 0 ) {
            alert('예약 인원은 최소 1명 이상입니다.');
            $('#how-many').val(1);
        }

        if ($('#choose-tour').val()==='title') {
            alert('투어 종류를 선택해주세요.');
        }

        return false; // 유효성 체크 후 제거할 것
    });

    function changePrice() {
        var howMany = $('#how-many').val();
        var tourNum = $('#choose-tour option:selected').val();
        var tourPrice;
        if ( tourNum === 'title') {
            tourPrice = 0; 
        } else if (tourNum === '3') {
            tourPrice = 23000;
        } else if ( tourNum === '6') {
            tourPrice = 34000;
        } else {
            tourPrice = 18000;
        }
        var totalPrice = $('#tour-tprice').val();
        totalPrice = tourPrice * howMany;
        $('#tour-tprice').val(totalPrice+'원');
    };

    // 투어종류 바뀌면 투어요금 바뀌기
    $('#container').on('change', '.tourreserve-content #choose-tour', function(){
        $('#choose-tour option:selected').each(function(){
            // 가격 변화 공통 펑션
            changePrice();
        });
    });

    // 투어예약 인원 마이너스버튼
    $('#container').on('click', '.reserve-form a.minus', function(){
        var howMany = $('#how-many').val();
        howMany--;
        $('#how-many').val(howMany);

        // 가격 변화 공통 펑션
        changePrice();

        return false;
    });

    // 투어예약 인원 플러스버튼
    $('#container').on('click', '.reserve-form a.plus', function(){
        var howMany = $('#how-many').val();
        howMany++;
        $('#how-many').val(howMany);

        // 가격 변화 공통 펑션
        changePrice();

        return false;
    });

    // 예약 조회 폼
    $('#container').on('submit', '.checkReserve-content form', function(){
        
        return false; // 유효성 체크 후 제거할 것
    });

})(jQuery)

// 회원가입 폼 유효성 체크
function join_check() {
    if ( !document.join_form.id.value ) {
        alert('아이디를 입력하세요.');
        document.join_form.id.focus();
        return false;
    }
    if ( !document.join_form.pass.value ) {
        alert('비밀번호를 입력하세요.');
        document.join_form.pass.focus();
        return false;
    }
    if ( !document.join_form.passok.value ) {
        alert('비밀번호 재확인을 입력하세요.');
        document.join_form.passok.focus();
        return false;
    }
    if ( !document.join_form.name.value ) {
        alert('이름을 입력하세요.');
        document.join_form.name.focus();
        return false;
    }
    if ( !document.join_form.email.value ) {
        alert('이메일 주소를 입력하세요.');
        document.join_form.email.focus();
        return false;
    }
    if ( !document.join_form.phone.value ) {
        alert('휴대폰번호를 입력하세요.');
        document.join_form.phone.focus();
        return false;
    }
    if ( document.join_form.pass.value !== document.join_form.passok.value ) {
        alert('비밀번호와 비밀번호 재확인이 일치하지 않습니다.');
        document.join_form.pass.focus();
        return false;
    }
    var eljoinform = document.getElementById('joinform');
    if ( !eljoinform.classList.contains('on') ) {
        alert ('아이디 중복체크를 해주세요.');
        return false;
    }
    document.join_form.submit();
}

// 조인폼 취소버튼 누르면 #joinform의 class 'on' 삭제
function remove_check() {
    document.getElementById('joinform').classList.remove('on');
}

// 아이디 중복체크버튼
function id_check() {
    window.open('id_check.php?id='+document.join_form.id.value, "", "width=350, height=200, left=300, top=300, scrollbars=no, resizable=yes")
}

// 로그인 폼 유효성 체크
function login_check() {
    if ( !document.login_form.id.value ) {
        alert('아이디를 입력하세요.');
        document.login_form.id.focus();
        return false;
    }
    if ( !document.login_form.pass.value ) {
        alert('비밀번호를 입력하세요.');
        document.login_form.pass.focus();
        return false;
    }
    document.login_form.submit();
}